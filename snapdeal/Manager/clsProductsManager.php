<?php
error_reporting(0);
include_once('../objects/clsProduct.php');
include_once('../DataAccess/DataaccessHelper.php');
class clsProductsManager{
	public $DataBaseHelper=NULL;
	
	
	public static function InsertProducts($ProductsObject){
		$DataBaseHelper=new DataAccessHelper();
		$sql="INSERT INTO `products` (`product_id`,`product_name`, `product_price`, `dis_percentange`,`before_dis_price`,`emi_availablity`,`emi_rate`,`features`,`img_url`,`category_name`,`sub_category_name`,`product_details_url`) VALUES ('".$ProductsObject->getProductId() ."','".$ProductsObject->GetProductName()."','".$ProductsObject->GetProductPrice()."', '".$ProductsObject->GetDiscountDetails()."','".$ProductsObject->GetProductBeforeDiscounePrice()."','".$ProductsObject->GetEmi()."','".$ProductsObject->GetEmiDetails()."','".$ProductsObject->GetProductFeatures()."','".$ProductsObject->GetImgUrl()()."','".$ProductsObject->GetProductCategory()."','".$ProductsObject->GetProductSubCategory()."','".$ProductsObject->GetProductDetailUrl()."')";  
		
		echo $sql;
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}
	
	
}
?>