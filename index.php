<?php
		
// Kickstart the framework
$f3=require('lib/base.php');
$f3 = Base::instance();
		
$f3->config('config.ini');
$f3->config('routes.ini');
		

$f3->run();
