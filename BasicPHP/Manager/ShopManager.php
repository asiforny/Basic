<?php
include_once('../Objects/Shop.php');
class ShopManager{
	public $DataBaseHelper=NULL;
	
	public static function InsertShop($ShopObject){
		$DataBaseHelper=new databaseHelper();
		$sql="INSERT INTO `shop` (`shop_name`, `shop_address`, `shop_description`,`shop_type_id`,`date_time`,`user_id`) VALUES ('".$Shop->getShopName()."','".$Shop->getShopAd()."', '".$Shop->getShopDesc()."','".$Shop->getShopTI()."','".$Shop->getDateTime()."','".$Shop->getUserID()."')"; // You have to write a insert query for MySQL using the Data from $UserObject; 
		//An Example of this can be like this : $sql="INSERT INTO `user` (`name`, `password`, `email`) VALUES ('".$User->getUserName()."','".$User->getPassWord()."', '".$User->getEmailAddress()."')";
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}
	
	public static function DeleteShop($ShopObject){
		$DataBaseHelper=new databaseHelper();
		$sql="DELETE FROM `shop` WHERE shop_id ='".$Shop->getShopID()."'"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
	
	public static function Update($ShopObject){
		$DataBaseHelper=new databaseHelper();
		$sql="UPDATE `shop` SET shop_name='".$Shop->getShopName()."', shop_address='".$Shop->getShopAd()."',shop_description = '".$Shop->getShopDesc()."', shop_type_id = '".$Shop->getShopTI()."',date_time = '".$Shop->getDateTime()."',user_id = '".$Shop->getUserID()."'  WHERE shop_id = '".$Shop->getShopID()."'"; // Write your Query here
		return $DataBaseHelper->ExecuteQuery($sql);
	}
}
?>