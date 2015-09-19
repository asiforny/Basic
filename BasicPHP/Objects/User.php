<?php
class User {
	private $user_id;
	private $uer_name;
	private $user_pass;
	private $user_email;
	private $date_time;
	
	public function setUserID($user_id){
		$this->user_id=$user_id;
	}	
	public function getUserID(){
		return $this->user_id;
	}
	
	public function setUserName($uer_name){
		$this->user_name=$uer_name;
	}
	public function getUserName(){
		return $this->user_name;
	}
	
	/*Please complete the coding for other private variables*/
	/*After that in the same way write class for Shop*/
	
	public function setPass($user_pass){
		$this->user_pass=$user_pass;
	}
	public function getPass(){
		return $this->user_pass;
	}
	
	public function setEmail($user_email){
		$this->user_email=$user_email;
	}
	public function getEmail(){
		return $this->user_email;
	}
	
	public function setDate($date_time){
		$this->date_time=$date_time;
	}
	public function getDate(){
		return $this->date_time;
	}
	
	public function User($user_id,$uer_name,$user_pass,$user_email,$date_time){
		$this->setUserID($user_id);
		$this->setUserName($uer_name);
		$this->setPass($user_pass);
		$this->setEmail($user_email);
		$this->setDate($date_time);
		return $this;
	}
	
}
?>