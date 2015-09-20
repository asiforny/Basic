<?php
include_once('../Objects/Shop.php');
include_once('../Manager/ShopManager.php');

$Shop = new Shop("1","Sohel","Uttara","Good","A123","19/09/15","2");


UTC_CreateShop($Shop);
UTCInsertShop($Shop);

function UTC_CreateShop($Shop){
	echo "<pre>";
		print_r($Shop);
	echo "</pre>";
}


function UTCInsertShop($Shop){
	ShopManager::InsertShop($Shop);
}

?>