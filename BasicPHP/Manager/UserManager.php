<?php
include_once('../Objects/User.php');
include_once('../DataAccess/DataAccessHelper.php');
class UserManager{
	public $DataBaseHelper=NULL;

	public static function InsertUser($UserObject){
		$DataBaseHelper=new DataAccessHelper();
		$sql="INSERT INTO `user` (`user_name`, `user_pass`, `user_email`,`date_time`) VALUES ('".$UserObject->getUserName()."','".$UserObject->getPassWord()."', '".$UserObject->getEmailAddress()."','".$UserObject->getDateTime()."')"; 
		
		echo $sql;
			
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}
	
	public static function DeleteUser($UserObject){
		$DataBaseHelper=new DataAccessHelper();
		$sql="DELETE FROM `user` WHERE user_id ='".$UserObject->getUserID()."'"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
	
	public static function Update($UserObject){
		$DataBaseHelper=new DataAccessHelper();
		$sql="UPDATE `user` SET user_name='".$UserObject->getUserName()."', user_pass='".$UserObject->getPassWord()."',user_email = '".$UserObject->getEmailAddress()."', date_time = '".$UserObject->getDateTime()."' WHERE user_id = '".$UserObject->getUserID()."'"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
	
}
?>