<?php 
error_reporting(0);
class products{

private $product_id;	
private $product_name;  
private $product_price;  
private $dis_percentange; 
private $before_dis_price;
private $emi_availablity; 
private $emi_rate;
private $features;
private $image;
private $category_name;
private $sub_category_name;

public function Set($key){
	$this->key=$key;
}
public function Get(){
	return $var;
}	


public function  SetProductID($product_id){
	$this->product_id=$$product_id;
}
public function  GetProductID(){
	return $this->product_id;
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

public function Setdiscount($dis_percentange){
	$this->dis_percentange=$dis_percentange;
}
public function Getdiscount(){
	return $this->dis_percentange;
}

public function Setbfdiscount($before_dis_price){
	$this->before_dis_price=$before_dis_price;
}
public function Getbfdiscount(){
	return $this->before_dis_price;
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

public function Setfeatures($features){
	$this->features=$features;
}
public function Getfeatures(){
	return $this->features;
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


public function products($product_id,$product_name,$product_price,$dis_percentange,$before_dis_price,$emi_availablity,$emi_rate,$features,$capacity_,$key_features,$image,$category_name,$sub_category_name){
		$this->SetProductID($product_id);
		$this->SetProductName($product_name);
		$this->SetProductPrice($product_price);
		$this->Setdiscount($discount);
		$this->Setbfdiscount($before_dis_price);
		$this->SetEMIAV($emi_availablity);
		$this->SetEMIR($emi_rate);
		$this->Setfeatures($features);
		$this->SetImage($image);
		$this->SetCatN($category_name);
		$this->SetSCatN($sub_category_name);
		return $this;



}





	

}




?>