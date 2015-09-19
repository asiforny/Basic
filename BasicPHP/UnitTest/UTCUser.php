<?php
include_once('../Objects/User.php');
include_once('../Manager/UserManager.php');

$User = new User("1","sohel","pass","myemail","19/09/15");


UTC_CreateUser($User);
UTCInsertUser($User);

function UTC_CreateUser($User){
	echo "<pre>";
		print_r($User);
	echo "</pre>";
}


function UTCInsertUser($User){
	UserManager::InsertUser($User);
}

?>