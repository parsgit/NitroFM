<?php
class installController {
	public $db;
	public function db_setup($f3) {
		echo \Template::instance ()->render ( 'install\installdb.html' );
	}
	public function manage($f3) {
		
		switch ($f3->get ( 'PARAMS.param', null )) {
			case createDB :
				$return= $this->createDB ($f3);
				break;
			case create_user:
				$this->create_user();
				break;
			case create_admin_user:
				$return= $this->create_admin_user($f3);
				break;
			default :
				;
				break;
		}
		if (isset($return)){
		echo json_encode( $return);
		}
	}
	function initDB($db_name,$db_username,$password) {
		if (is_null ( $db )) {
			$db = new DB\SQL ( 'mysql:host=localhost;port=3306;dbname='.$db_name,$db_username, $password );
			$this->db = $db;
		}
	}
	public function createDB($f3) {
		$db_name=$f3->get("POST.db_name",null);
		$db_username=$f3->get("POST.db_username",null);
		$password=$f3->get("POST.db_password",null);

		if (is_null($db_name) || is_null($db_username) || is_null($password)){
			return ['ok'=>false,'message'=>'Please Complete all fields'];
		}
		
		$this->initDB ($db_name,$db_username,$password);
		$db = $this->db;
		$db->exec ("CREATE TABLE IF NOT EXISTS `users` (`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, username varchar(128) NOT NULL, password varchar(250) NULL , userType varchar(50) NULL,
email varchar(128) NULL,name varchar(128) NULL,phone varchar(128) NULL )");
		$creatResult=$db->exec ("SHOW TABLES LIKE ?","users");
		return ['ok'=>$creatResult?true:false,'message'=>($creatResult?"successful Create Table":"There is a problem or you did not enter the database correctly")];
	}

	public function create_user(){
		
		echo \Template::instance ()->render ( 'install\create_user.html' );
		
	}
	public function create_admin_user($f3){
		
		$db_name=$f3->get("POST.db_name",null);
		$db_username=$f3->get("POST.db_username",null);
		$password=$f3->get("POST.db_password",null);
		
		$admin_username=$f3->get("POST.admin_username",null);
		$admin_password=$f3->get("POST.admin_password1",null);
		$admin_confirm_password=$f3->get("POST.admin_password2",null);
		
		
		$this->initDB ($db_name,$db_username,$password);
		$db=$this->db;
		$selectUsers=$db->exec("select * from users");
		if (count($selectUsers)>0){
			return ['ok'=>false,'message'=>"There is another account"];
		}
		if ($admin_password != $admin_confirm_password || mb_strlen($admin_password)<6) {
			return ['ok'=>false,'message'=>"Password must contain at least 6 characters and password must be the same with its repeat"];
		}
		$db->exec("insert into users (username,password,userType) values (?,?,?)",
				[$admin_username,hash('sha256',$admin_password),'admin']);
		
		$index_content="<?php
		
// Kickstart the framework
f3=require('lib/base.php');
f3 = Base::instance();
		
f3->config('config.ini');
f3->config('routes.ini');
		
// Database config
mydb=new DB\SQL ( 'mysql:host=localhost;port=3306;dbname='.'$db_name','$db_username', '$password' );
		f3->set('DB',mydb);
		new \DB\SQL\Session(mydb);
		myu_id=f3->get('SESSION.user_id',null);
		if (! is_null(myu_id)){
			f3->set('isLogin',true);
			myuser=mydb->exec('select * from users where id=?',myu_id);
			if (count(myuser)==1){
				f3->set('user',myuser[0]);
			}
		}else{f3->set('isLogin',false);}

f3->run();";
		
		
		$index_content=str_replace('f3','$f3', $index_content);
		$index_content=str_replace('myu_id','$myu_id', $index_content);
		$index_content=str_replace('myuser','$myuser', $index_content);
		$index_content=str_replace('mydb','$mydb', $index_content);
		$file = fopen("index.php","w");
		$f3_temp='$f3';
		fwrite($file,$index_content);
		fclose($file);
		
		return ['ok'=>true,'message'=>"Installation completed successfully"];
	}
}
