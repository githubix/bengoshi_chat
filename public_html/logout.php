<?php

require_once(__DIR__ . '/../config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

	if(!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']){
		echo "Invalid Token!";
		exit;
	}

	// mysql condition_flagを0に変更
	$userModel = new \MyApp\Model\User();
  	$userModel->offline([
 	 'email' => $_POST['email']
  	]);

	$_SESSION = [];

	if (isset($_COOKIE[session_name()])){
		setcookie(session_name(), '', time() - 86400, '/');
	}


	session_destroy();
}




header('Location: ' . SITE_URL);