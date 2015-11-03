<?php
error_reporting(0);
include_once('../objects/clsProduct.php');
include_once('databaseHelper.php');
class clsProductsManager{
	public $DataBaseHelper=NULL;
	public static function InsertProducts($ProductsObject){         
                 
                echo '<pre>';
                print_r($ProductsObject);
                echo '</pre>';
                //echo "i am here";
		$DataBaseHelper=new DataAccessHelper();
		$sql="INSERT INTO `products` (`product_id`,`product_name`, `product_price`, `dis_percentange`,`before_dis_price`,`emi_availablity`,`emi_rate`,`features`,`img_url`,`category_name`,`sub_category_name`,`product_details_url`,`product_rating`) VALUES ('".NULL ."','".$ProductsObject->GetProductName()."','".$ProductsObject->GetProductPrice()."', '".$ProductsObject->GetDiscountDetails()."','".$ProductsObject->GetProductBeforeDiscounePrice()."','".$ProductsObject->GetEmi()."','".$ProductsObject->GetEmiDetails()."','".$ProductsObject->GetProductFeatures()."','".$ProductsObject->GetImgUrl()."','".$ProductsObject->GetProductCategory()."','".$ProductsObject->GetProductSubCategory()."','".$ProductsObject->GetProductDetailUrl()."','".$ProductsObject->GetProductRating()."')";  		
		echo $sql."<br/>";
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}	
}
?>