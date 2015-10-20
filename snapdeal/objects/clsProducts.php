<?php 
error_reporting(0);
class products{
	
private $product_name;  
private $product_price;  
private $discount; 
private $emi_availablity; 
private $emi_rate;
private $type;
private $capacity_;
private $key_features;
private $image;
private $category_name;
private $sub_category_name;

public function Set($key){
	$this->key=$key;
}
public function Get(){
	return $var;
}	

public function  SetProductName($product_name){
	$this->product_name=$$product_name;
}
public function  GetProductName(){
	return $this->product_name;
}

public function SetProductPrice($product_price){
	$this->product_price=$product_price;
}
public function getProductPrice(){
	return $this->product_price;
}	

public function Setdiscount($discount){
	$this->discount=$discount;
}
public function Getdiscount(){
	return $this->discount;
}
	
public function SetEMIAV($emi_availablity){
	$this->emi_availablity=$emi_availablity;
}
public function GetEMIAV(){
	return $this->emi_availablity;
}


public function SetEMIR($emi_rate){
	$this->emi_rate=$emi_rate;
}
public function GetEMIR(){
	return $this->emi_rate;
}

public function SetType($type){
	$this->type=$type;
}
public function GetType(){
	return $this->type;
}	


public function SetCapacity($capacity_){
	$this->capacity_=$capacity_;
}
public function GetCapacity(){
	return $this->capacity_;
}	

public function SetKeyf($key_features){
	$this->key_features=$key_features;
}
public function GetKeyf(){
	return $this->key_features;
}	

public function SetImage($image){
	$this->image=$image;
}
public function GetImage(){
	return $this->image;
}	


public function SetCatN($category_name){
	$this->category_name=$category_name;
}
public function GetCatN(){
	return $this->category_name;
}	


public function SetSCatN($sub_category_name){
	$this->sub_category_name=$sub_category_name;
}
public function GetSCatN(){
	return $this->sub_category_name;
}	


public function products($product_name,$product_price,$discount,$emi_availablity,$emi_rate,$type,$capacity_,$key_features,$image,$category_name,$sub_category_name){
		$this->SetProductName($$product_name);
		$this->SetProductPrice($product_price);
		$this->Setdiscount($discount);
		$this->SetEMIAV($emi_availablity);
		$this->SetEMIR($emi_rate);
		$this->SetType($type);
		$this->SetCapacity($capacity_);
		$this->SetKeyf($key_features);
		$this->SetImage($image);
		$this->SetCatN($category_name);
		$this->SetSCatN($sub_category_name);
		return $this;



}





	

}




?>