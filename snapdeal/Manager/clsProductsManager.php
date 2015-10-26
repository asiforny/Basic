<?php
error_reporting(0);
include_once('../objects/clsProducts.php');
include_once('../DataAccess/DataaccessHelper.php');
class clsProductsManager{
	public $DataBaseHelper=NULL;
	
	
	public static function InsertProducts($ProductsObject){
		$DataBaseHelper=new DataAccessHelper();
		$sql="INSERT INTO `products` (`product_id`,`product_name`, `product_price`, `dis_percentange`,`before_dis_price`,`emi_availablity`,`emi_rate`,`features`,`image`,`category_name`,`sub_category_name`) VALUES ('".$ProductsObject->GetProductID() ."','".$ProductsObject->GetProductName()."','".$ProductsObject->getProductPrice()."', '".$ProductsObject->Getdiscount()."','".$ProductsObject->Getbfdiscount()."','".$ProductsObject->GetEMIAV()."','".$ProductsObject->GetEMIR()."','".$ProductsObject->Getfeatures()."','".$ProductsObject->GetImage()."','".$ProductsObject->GetCatN()."','".$ProductsObject->GetSCatN()."')";  
		
		echo $sql;
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}
	
	
}
?>