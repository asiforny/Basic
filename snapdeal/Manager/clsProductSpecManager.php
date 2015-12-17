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
}




function safe($value){
	return mysql_real_escape_string($value);
}

?>
