<?php
error_reporting(0);
include_once('../objects/clsProducts.php');
include_once('../DataAccess/DataaccessHelper.php');
class clsProductsManager{
	public $DataBaseHelper=NULL;
	
	public static function InsertProducts($ProductsObject){
		$DataBaseHelper=new DataAccessHelper();
		$sql="INSERT INTO `products` (`product_name`, `product_price`, `discount`,`emi_availablity`,`emi_rate`,`type`,`capacity_`,`key_features`,`image`,`category_name`,`sub_category_name`) VALUES ('".$ProductsObject->GetProductName()."','".$ProductsObject->getProductPrice()."', '".$ProductsObject->Getdiscount()."','".$ProductsObject->GetEMIAV()."','".$ProductsObject->GetEMIR()."','".$ProductsObject->GetType()."','".$ProductsObject->GetCapacity()."','".$ProductsObject->GetKeyf()."','".$ProductsObject->GetImage()."','".$ProductsObject->GetCatN()."','".$ProductsObject->GetSCatN()."')";  
		
				echo $sql;
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}
	
	
}
?>