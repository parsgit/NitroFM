<?php
namespace auth;

use Auth;
use DB\SQL;

// use DB\SQL\Session;
class authController {
	var $db = null;
	public function manage($f3) {

		switch ($f3->get ( 'PARAMS.param', null )) {
			case Authenticating :
				$return = $this->Authenticating ( $f3 );
				break;
			case 'set':
				$return =$this->set($f3);
				break;
			case 'get':
				$return= $this->get($f3);
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

		if ($username == $f3->get('dbUsername') && $password == $f3->get('dbPassword') ) {
			$f3->set ( 'SESSION.login', true );

			return ['ok'=>true,'message'=>"Login is successfully"];
		}
		return ['ok'=>false,'message'=>"Password or username is incorrect"];
	}


}
