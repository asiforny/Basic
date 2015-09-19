<?php
include_once('../Objects/User.php');
class UserManager{
	public $DataBaseHelper=NULL;
	
	public static function InsertUser($UserObject){
		$DataBaseHelper=new databaseHelper();
		$sql="INSERT INTO `user` (`user_name`, `user_pass`, `user_email`,`date_time`) VALUES ('".$User->getUserName()."','".$User->getPassWord()."', '".$User->getEmailAddress()."','".$User->getDateTime()."')"; // You have to write a insert query for MySQL using the Data from $UserObject; 
		//An Example of this can be like this : $sql="INSERT INTO `user` (`name`, `password`, `email`) VALUES ('".$User->getUserName()."','".$User->getPassWord()."', '".$User->getEmailAddress()."')";
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}
	
	public static function DeleteUser($UserObject){
		$DataBaseHelper=new databaseHelper();
		$sql="DELETE FROM `user` WHERE user_id ='".$User->getUserID()."'"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
	
	public static function Update($UserObject){
		$DataBaseHelper=new databaseHelper();
		$sql="UPDATE `user` SET user_name='".$User->getUserName()."', user_pass='".$User->getPassWord()."',user_email = '".$User->getEmailAddress()."', date_time = '".$User->getDateTime()."' WHERE user_id = '".$User->getUserID()."'"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
}
?>