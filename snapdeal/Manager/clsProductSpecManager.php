<?php
error_reporting(0);
include_once('../objects/cls_product_spec.php');
include_once('databaseHelper.php');
class clsProductSpecManager{
	public $DataBaseHelper=NULL;
	public static function InsertProducts($ProductsObject){         
                 
               // echo '<pre>';
               // print_r($ProductsObject);
               // echo '</pre>';
                //echo "i am here";
		$DataBaseHelper=new DataAccessHelper();
		$sql="INSERT INTO `product_spec` (`id`,`product_id`, `product_spec_type`, `product_data`) VALUES ('".NULL ."','".safe($ProductsObject->GetProductID())."','".safe($ProductsObject->GetProductSpecType())."', '".safe($ProductsObject->GetProductData())."')";  		
		//echo $sql."<br/>";
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
		
		
		
	}

	
	public static function GetAllProductURL($TableName){
		
		$sql="SELECT `product_id`,`product_name`,`product_price`,`dis_percentange`,`before_dis_price`,`emi_availablity`,`emi_rate`,`features`,`img_url`,`category_name`,`sub_category_name`,`product_details_url`,`product_rating` FROM " ."'".$TableName."'"; //`isCrawled`='0' LIMIT 13101,33929";
 echo $sql;
 
 return ;
 
 $DataBaseHelper=new DataAccessHelper();
 $dataset=$DataBaseHelper->ExecuteDataSet($sql);
 
 echo "here i am";
 echo "<pre>";
 print_r($dataset);
 echo "<pre>";
			
	}
	
}



clsProductSpecManager::GetAllProductURL("antiques_&_collectibles");


function safe($value){
	return mysql_real_escape_string($value);
}

?>
