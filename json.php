<?php

session_start();// include Imap.Class
$emailuser = $_SESSION['mailusername'];
$emailpass = $_SESSION['mailpassword'];
include_once('lib/class.imap.php');
 $email = new Imap();
 $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
 $connect=$email->connect($hostname, $emailuser,$emailpass);
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
if($connect){
	if(isset($_POST['inbox'])){
		$inbox = $email->getMessages('html');
		echo json_encode($inbox, JSON_PRETTY_PRINT);
	}else if(!empty($_POST['uid']) && !empty($_POST['part']) && !empty($_POST['file']) && !empty($_POST['encoding'])){
		$inbox = $email->getFiles($_POST);
		echo json_encode($inbox, JSON_PRETTY_PRINT);
	}else {
		echo json_encode(array("status" => "error", "message" => "Not connect."), JSON_PRETTY_PRINT);
	}
}else{
	echo json_encode(array("status" => "error", "message" => "Not connect."), JSON_PRETTY_PRINT);
}
?>