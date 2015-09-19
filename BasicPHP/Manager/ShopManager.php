<?php
include_once('../Objects/Shop.php');
class ShopManager{
	public $DataBaseHelper=NULL;
	
	public static function InsertShop($ShopObject){
		$DataBaseHelper=new DataAccessHelper();
		$sql="INSERT INTO `shop` (`shop_name`, `shop_address`, `shop_description`,`shop_type_id`,`date_time`,`user_id`) VALUES ('".$ShopObject->getShopName()."','".$ShopObject->getSAddress()."', '".$ShopObject->getSDesc()."','".$ShopObject->getSTid()."','".$ShopObject->getDate()."','".$ShopObject->getUserID()."')"; // You have to write a insert query for MySQL using the Data from $UserObject; 
		//An Example of this can be like this : $sql="INSERT INTO `user` (`name`, `password`, `email`) VALUES ('".$User->getUserName()."','".$User->getPassWord()."', '".$User->getEmailAddress()."')";
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}
	
	public static function DeleteShop($ShopObject){
		$DataBaseHelper=new DataAccessHelper();
		$sql="DELETE FROM `shop` WHERE shop_id ='".$ShopObject->getShopID()."'"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
	
	public static function Update($ShopObject){
		$DataBaseHelper=new DataAccessHelper();
		$sql="UPDATE `shop` SET shop_name='".$ShopObject->getShopName()."', shop_address='".$ShopObject->getSAddress()."',shop_description = '".$ShopObject->getSDesc()."', shop_type_id = '".$ShopObject->getSTid()."',date_time = '".$ShopObject->getDate()."',user_id = '".$ShopObject->getUserID()."'  WHERE shop_id = '".$ShopObject->getShopID()."'"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
}
?>