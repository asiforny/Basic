<?php
class Shop {
	private $shop_id;
	private $shop_name;
	private $shop_address;
	private $shop_description;
	private $shop_type_id;
	private $date_time;
	private $user_id;
	
	
	public function setShopID($shop_id){
		$this->shop_id=$shop_id;
	}	
	public function getShopID(){
		return $this->shop_id;
	}
	
	public function setShopName($shop_name){
		$this->shop_name=$shop_name;
	}
	public function getShopName(){
		return $this->shop_name;
	}
	
	public function setSAddress($shop_address){
		$this->shop_address=$shop_address;
	}
	public function getSAddress(){
		return $this->shop_address;
	}
	
	public function setSTid($shop_type_id){
		$this->shop_type_id=$shop_type_id;
	}
	public function getSTid(){
		return $this->shop_type_id;
	}
	
	public function setDate($date_time){
		$this->date_time=$date_time;
	}
	public function getDate(){
		return $this->date_time;
	}
	
	public function setUserID($user_id){
		$this->user_id=$user_id;
	}	
	public function getUserID(){
		return $this->user_id;
	}
	
	
}
?>