<?php
set_time_limit(0);
include_once('../simple_html_dom.php');
include_once ('../objects/clsProduct.php');
include_once ('../Manager/clsProductsManager.php');

$url="file:///C:/xampp/htdocs/scrapping/snapdeal/app/testhtml.html";
$innerHtml = file_get_html($url);
$ProductArray=NULL;
$SingleProduct=NULL;
foreach($innerHtml->find('div[class=product_grid_row] div[class=product_grid_cont hoverProdCont4Grid gridLayout4] div[class=productWrapper] div[class=hoverProductWrapper product-txtWrapper]') as $item)
{
	$SingleProduct=new product();
        $SingleProduct->SetProductDetailUrl($item->find("a[class=hit-ss-logger somn-track prodLink hashAdded]",0)->href);
        
       // echo $item->find("a[class=hit-ss-logger somn-track prodLink hashAdded]",0)->href;
        
	foreach($item->find('p[class=product-title]') as $title){	
			$SingleProduct->SetProductName($title->plaintext);
	}
	
	foreach($item->find('div[class=product-price]') as $priceData){	

		$price = $priceData->find("p",0)->plaintext;
		$SingleProduct->SetProductPrice($price);
		if($priceData->find("p",1)!=NULL){
			$before_dis_price=$priceData->find("strike",0)->plaintext;
			$dis_percent=$priceData->find("span[class=percDesc]",0)->plaintext;
			
			$SingleProduct->SetProductBeforeDiscounePrice($before_dis_price);
			$SingleProduct->SetDiscountDetails($dis_percent);
		}
		if($priceData->find("p[class=emiMonthsHoverGrid]",0)!=NULL){
			$SingleProduct->SetEmi("1");
			$emidetails=$priceData->find("p[class=emiMonthsHoverGrid]",0)->plaintext;
			$SingleProduct->SetEmiDetails($emidetails);
			//echo $priceData->find("p[class=emiMonthsHoverGrid]",0)->plaintext;
		}			
	}
	
	$features=$item->find("div[class=lfloat product_list_view_highlights]",0);
	//echo $features;
	$i=0;
        $conDataAll="";
	foreach ($features->find('ul[id=highLights] li') as $feature_item){
		//echo "item ".$i."-->".$feature_item."</br>";
                if($i==0){
                    $conDataAll.=$feature_item->plaintext;
                }
                else{
                    $conDataAll.=",".$feature_item->plaintext;
                }
		$i++;
	}
	
        echo $conDataAll."</br>";
        
	$SingleProduct->SetProductFeatures($conDataAll);
        //echo $SingleProduct->GetProductDetailUrl();
	//echo $SingleProduct->GetProductPrice()."dis-price".$SingleProduct->GetProductBeforeDiscounePrice()."dis_percen".$SingleProduct->GetDiscountDetails()."</br>"."EMI Has:".$SingleProduct->GetEmi()."EMI Details".$SingleProduct->GetEmiDetails()."Features : ".$SingleProduct->GetProductFeatures()."HREF: ".$SingleProduct->GetProductDetailUrl();
        
       $DataAccess = new DataaccessHelper();
       try{
        clsProductsManager::InsertProducts($SingleProduct);
       }
       catch(Exception $ex){
           //echo $ex;
       }
}


?>