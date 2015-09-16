<?php
include_once('../Objects/User.php');
class UserManager{
	public $DataBaseHelper=NULL;
	
	public static function InsertUser($UserObject){
		$DataBaseHelper=new databaseHelper();
		$sql="WRITE YOUR QUERY HERE"; // You have to write a insert query for MySQL using the Data from $UserObject; 
		//An Example of this can be like this : $sql="INSERT INTO `user` (`name`, `password`, `email`) VALUES ('".$User->getUserName()."','".$User->getPassWord()."', '".$User->getEmailAddress()."')";
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}
	
	public static function DeleteUser($UserObject){
		$DataBaseHelper=new databaseHelper();
		$sql="WRITE DELETE QUERY HERE"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
	
	public static function Update($UserObject){
		$DataBaseHelper=new databaseHelper();
		$sql="WRITE Update QUERY HERE"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
}
?>