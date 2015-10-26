<?php 

class product{

private $_product_id;
private $_product_name;	
private $_product_details;
private $_product_price;
private $_product_price_before_discount;
private $_product_discount_details;
private $_product_has_emi;
private $_product_emai_details;
private $_product_features;
private $_product_category;
private $_product_sub_category;

public function SetProductId($productid){
	$this->_product_id=$productid;
}
public function getProductId(){
	return $this->_product_id;
}

public function SetProductName($name){
	$this->_product_name=$name;
}
public function GetProductName(){
	return $this->_product_name;
}
	
public function  SetProductDetails($productdetails){
	$this->_product_details=$productdetails;
}
public function  GetProductDetails(){
	return $this->_product_details;
}

public function SetProductPrice($price){
	$this->_product_price=$price;
}
public function GetProductPrice(){
	return $this->_product_price;
}

public function SetProductBeforeDiscounePrice($before_discount_price){
	$this->_product_price_before_discount=$before_discount_price;
}
public function GetProductBeforeDiscounePrice(){
	return $this->_product_price_before_discount;
}

public function SetDiscountDetails($discount_details){
	$this->_product_discount_details=$discount_details;
}
public function GetDiscountDetails(){
	return $this->_product_discount_details;
}

public function SetEmi($isEmi){
	$this->_product_has_emi=$isEmi;
}
public function GetEmi(){
	return $this->_product_has_emi; 
}

public function SetEmiDetails($emidetails){
	return $this->_product_emai_details=$emidetails;
}
public function GetEmiDetails(){
	return $this->_product_emai_details;
}

public function SetProductCategory($category){
	$this->_product_category=$category;
}
public function GetProductCategory($category){
	return $this->_product_category;
}

public function SetProductSubCategory($product_sub_category){
	$this->_product_sub_category=$product_sub_category;
}
public function GetProduSetProductSubCategoryct(){
	return $this->_product_sub_category;
}

public function SetProductFeatures($features){
	$this->_product_features=$features;
}
public function GetProductFeatures(){
	return $this->_product_features;
}

function __construct(){
	
}


}

?>