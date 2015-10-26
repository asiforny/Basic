<?php
set_time_limit(0);
include_once('../simple_html_dom.php');
include_once '../objects/clsProduct.php';

$url="file:///C:/xampp/htdocs/scrapping/snapdeal/app/testhtml.html";
$innerHtml = file_get_html($url);
$ProductArray=NULL;
$SingleProduct=NULL;
foreach($innerHtml->find('div[class=product_grid_row] div[class=product_grid_cont hoverProdCont4Grid gridLayout4] div[class=productWrapper] div[class=hoverProductWrapper product-txtWrapper]') as $item)
{
	$SingleProduct=new product();
	foreach($item->find('p[class=product-title]') as $title){	
			$SingleProduct->SetProductName($title);
	}
	
	foreach($item->find('div[class=product-price]') as $priceData){	

		$price = $priceData->find("p",0);
		$SingleProduct->SetProductPrice($price);
		if($priceData->find("p",1)!=NULL){
			$before_dis_price=$priceData->find("strike",0);
			$dis_percent=$priceData->find("span[class=percDesc]",0);
			
			$SingleProduct->SetProductBeforeDiscounePrice($before_dis_price);
			$SingleProduct->SetDiscountDetails($dis_percent);
		}
		if($priceData->find("p[class=emiMonthsHoverGrid]",0)!=NULL){
			$SingleProduct->SetEmi("1");
			$emidetails=$priceData->find("p[class=emiMonthsHoverGrid]",0)->plaintext;
			$SingleProduct->SetEmiDetails($emidetails);
			echo $priceData->find("p[class=emiMonthsHoverGrid]",0)->plaintext;
		}			
	}
	
	$features=$item->find("div[class=lfloat product_list_view_highlights]",0);
	echo $features;
	$i=0;
	foreach ($features->find('ul[id=highLights] li') as $feature_item){
		echo "item ".$i."-->".$feature_item."</br>";
		$i++;
	}
	
	$SingleProduct->SetProductFeatures($features->plaintext);
	echo $SingleProduct->GetProductPrice()."dis-price".$SingleProduct->GetProductBeforeDiscounePrice()."dis_percen".$SingleProduct->GetDiscountDetails()."</br>"."EMI Has:".$SingleProduct->GetEmi()."EMI Details".$SingleProduct->GetEmiDetails()."Features : ".$SingleProduct->GetProductFeatures();
}


?>