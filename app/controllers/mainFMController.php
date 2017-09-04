<?php
class mainFMController {
	public function manage($f3) {
		$isLogin = $f3->get ( 'isLogin' );
		if (! $isLogin) {
			$f3->reroute ( 'login' );
			return;
		}
		echo \Template::instance ()->render ( 'main.html' );
	}
	
	// routeing api
	public function action($f3) {
		$isLogin = $f3->get ( 'isLogin' );
		if (! $isLogin) {
			$f3->reroute ( '../login' );
			return;
		}
		$db = $f3->get ( 'DB' );
		
		// just create an object
		new \DB\SQL\Session ( $db );
		
		$path = $f3->get ( 'SESSION.path' );
		if ($path == null) {
			$path = getcwd ();
			$f3->set ( 'SESSION.path', $path );
		}
		
		switch ($f3->get ( 'PARAMS.action', '' )) {
			case 'get_dir_list' :
				$this->get_dir_list ( $path );
				break;
			case 'cd_to' :
				$this->cd_to ( $f3, $path );
				break;
			case 'delete_dir' :
				$this->delete_dir ( $f3, $path );
				break;
			case 'del' :
				$this->del ( $f3, $path );
				break;
			case 'resetpath' :
				$this->resetpath ( $f3 );
				break;
			case 'upload_file' :
				$this->upload_file ( $f3, $path );
				break;
			case 'new_dir' :
				$this->new_directory ( $f3, $path );
				break;
			case 'unzip':
				$this->unzip($f3, $path);
				break;
			case 'zip':
					$this->zip($f3, $path);
					break;
			case 'download_a_file':
				$this->download_a_file($f3,$path);
				break;
			default :
				echo '404';
				break;
		}
	}
	
	public function upload_file($f3, $path) {
		$web = \Web::instance ();
		if (mb_substr ( $path, (mb_strlen ( $path ) - 1), mb_strlen ( $path ) ) != "/") {
			$up_path = $path . "/";
		} else {
			$up_path = $path;
		}
		$f3->set ( 'UPLOADS', $up_path ); // don't forget to set an Upload directory, and make it writable!
		
		$overwrite = true; // set to true, to overwrite an existing file; Default: false
		$slug = false; // rename file to filesystem-friendly version
		
		$a = $web->receive ( function ($file, $formFieldName) {
			// var_dump($file);
			// maybe you want to check the file size
			if ($file ['size'] > (9 * 1024 * 1024)) // if bigger than 2 MB
				return false; // this file is not valid, return false will skip moving it
				              
			// everything went fine, hurray!
			return true; // allows the file to be moved from php tmp dir to your defined upload dir
		}, $overwrite, $slug );
		
		$result ['ok'] = true;
		$result ['data'] = $a;
		$result ['list'] = $this->get_dir_list ( $path, true );
		echo json_encode ( $result );
	}
	
	public function download_a_file($f3,$path){
		
		$filename= $f3->get ( 'GET.name', null );
		if ($filename==null){
			$result['ok']=false;
			$result['msg']="";
			$result['names']=$filename;
			echo json_encode( $result);
			return ;
		}
		
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename("$path/$filename").'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize("$path/$filename"));
		readfile("$path/$filename");
		exit;
		
	}
	
	// set default path
	public function resetpath($f3) {
		$path = getcwd ();
		$f3->set ( 'SESSION.path', $path );
		$this->get_dir_list ( $path );
	}
	
	// get file and dir list of name in path
	public function get_dir_list($path, $return_value = false) {
		$scan = scandir ( $path );
		
		// File and folder separation
		foreach ( $scan as $key => $value ) {
			if ($value != '.' && $value != '..') {
				if (is_dir ( $path . '/' . $value )) {
					$dirs [] = $value;
				} else {
					$files [] = $value;
				}
			}
		}
		$list ['dirs'] = $dirs;
		$list ['files'] = $files;
		$list ['path'] = $path;
		
		if (! $return_value) {
			echo json_encode ( $list );
		} else {
			return $list;
		}
	}
	
	// open dir
	public function cd_to($f3, $path) {
		$dir = $f3->get ( 'GET.dir', null );
		$user_path = $f3->get ( 'GET.path', null );
		if ($dir == null && $user_path != null) {
			if (is_dir ( $user_path )) {
				$f3->set ( 'SESSION.path', $user_path );
				$path = $user_path;
			}
		} else {
			
			if ($dir != '..' && is_dir ( $path . '/' . $dir )) {
				$path .= '/' . $dir;
				$f3->set ( 'SESSION.path', $path );
			} else {
				$arr = $this->getDataArray ( ($path . '/' . $dir), '/' );
				$path = '';
				for($i = 0; $i < (count ( $arr ) - 2); $i ++) {
					$path .= $arr [$i];
					if ($i < (count ( $arr ) - 3)) {
						$path .= '/';
					}
				}
				
				if (is_dir ( $path . '/' . $dir )) {
					$f3->set ( 'SESSION.path', $path );
				}
			}
		}
		
		// clear path
		if (strpos ( $path, '//' ) > - 1) {
			$path = str_replace ( '//', '/', $path );
			$f3->set ( 'SESSION.path', $path );
		}
		$this->get_dir_list ( $path );
	}
	
	// Delete a file or dir
	public function del($f3, $path, $name) {
		if (! is_null ( $name )) {
			if (! file_exists ( $path ) || ! file_exists ( $path . '/' . $name )) {
				$result ['file'] = $name;
				$result ['msg'] = 'Not File OR Directory Exists';
			} else if (! is_writable ( $path . '/' . $name )) {
				$result ['file'] = $name;
				$result ['msg'] = 'Not File Permission';
			} else if (! is_writable ( $path )) {
				$result ['file'] = $name;
				$result ['msg'] = 'Not Directory Permission';
			} else {
				if (is_dir ( $path . '/' . $name )) {
					
					$this->delTree(( $path . '/' . $name));
					
					//rmdir ( $path . '/' . $name );
				} else {
					unlink ( $path . '/' . $name );
				}
				$result ['deleted'] = $name;
			}
		} else {
			$result ['ok'] = false;
			$result ['msg'] = 'name is null';
		}
		return $result;
	}
	function delTree($dir)
	{
		$files = array_diff(scandir($dir), array('.', '..'));
		
		foreach ($files as $file) {
			(is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file");
		}
		
		return rmdir($dir);
	} 
	// Delete the list of files
	public function delete_dir($f3, $path) {
		$names = $f3->get ( 'POST.names', null ); // get a list of names for delete
		
		$count = 0;
		
		foreach ( $names as $key => $name ) {
			$del_result = $this->del ( $f3, $path, $name );
			$result ['log'] = $del_result; // show log in browser console
			$count ++;
		}
		
		$result ['ok'] = true;
		$result ['msg'] = "$count Item Deleted";
		$result ['list'] = $this->get_dir_list ( $path, true );
		
		echo (json_encode ( $result ));
	}
	
	// Create New directory
	public function new_directory($f3, $path) {
		$name = $f3->get ( 'GET.name', null );
		mkdir ( "$path/$name", 0700 );
		
		$this->get_dir_list ( $path );
	}
	
	// unzip files
	public function unzip($f3, $path) {
		$names = $f3->get ( 'GET.names', null );
		/*
		foreach ($names as $key => $name) {
			system('unzip -d  '."$path $path/$name");
		}*/
		
		require_once  ( __DIR__ . "/lib/zip/Zip.php");
		
		$zip = new Zip();
		
		foreach ($names as $key => $name) {
			$zip->unzip_file("$path/$name");
			$zip->unzip_to("$path");
			echo $name." \n";
		}
		
		
	}
	
	public function zip($f3, $path,$names=null){
		if ($names==null){
		$names = $f3->get ( 'GET.names', null );
		}
		
		require_once  ( __DIR__ . "/lib/zip/Zip.php");

		$zip = new Zip();
		$zip->zip_start( "$path/"."$names[0].zip");
		
		foreach ($names as $key=>$name){
			$zip->zip_add("$path/$name"); // adding a file
		}
		
		$zip->zip_end();
		return "$path/"."$names[0].zip";
	}
	public function getDataArray($data, $mark = "|") {
		$arr = null;
		try {
			while ( strpos ( $data, $mark ) > - 1 ) {
				$n = strpos ( $data, $mark );
				$text = substr ( $data, 0, $n );
				$arr [] = $text;
				$data = substr ( $data, $n + 1 );
			}
			if (strlen ( $data ) > 0) {
				$arr [] = $data;
			}
		} catch ( Exception $e ) {
		}
		return $arr;
	}
}
