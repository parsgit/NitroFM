<?php

namespace auth;

use Auth;
use DB\SQL;
use Session;

// use DB\SQL\Session;
class authController {
	var $db = null;
	public function manage($f3) {

		switch ($f3->get ( 'PARAMS.param', null )) {
			case Authenticating :
				$return = $this->Authenticating ( $f3 );
				break;
			default :
				;
				break;
		}
		if (isset($return)){
			echo json_encode( $return);
		}
	}
	
	public function login_page() {
		echo \Template::instance ()->render ( 'auth\login.html' );
	}
	public function Authenticating($f3) {
		$username = $f3->get ( "POST.username", null );
		$password = $f3->get ( "POST.password", null );
		$db = $f3->get ( 'DB' );
		$user = new \DB\Sql\Mapper ( $db, 'users' );
		$auth = new \Auth ( $user, array (
				'id' => 'username',
				'pw' => 'password' 
		) );
			
		$login_result = $auth->login ( $username, hash('sha256', $password )); // returns true on successful login
		if ($login_result) {
			$userSelect = $db->exec ( "select * from users where username=?", $username );
			// new Session();
			new \DB\SQL\Session ( $db );
			//$f3->set ( 'SESSION.username', $username );
			$f3->set ( 'SESSION.user_id', $userSelect [0] ['id'] );
			
			return ['ok'=>true,'message'=>"Login is successfully"];
		}
		return ['ok'=>false,'message'=>"Password or username is incorrect"];		
	}
}
