<?php
set_time_limit(0);
include_once('../simple_html_dom.php');
include_once ('../objects/clsProduct.php');
include_once ('../Manager/clsProductsManager.php');

$url="file:///C:/xampp/htdocs/targets/testhtml.html";
$innerHtml = file_get_html($url);
$ProductArray=NULL;
$SingleProduct=NULL;
//echo $innerHtml;

foreach($innerHtml->find('div[class=product_grid_row]  div[class=productWrapper] div[class=hoverProductWrapper product-txtWrapper]') as $item)
 {                                                             
   
        //div[class=product_grid_cont hoverProdCont4Grid gridLayout4]
	$SingleProduct=new product();
        /**
         * PLease add the category & SubCategory
         */
        $SingleProduct->SetProductCategory("Electronics");
        $SingleProduct->SetProductSubCategory("Micro-Oven");
        
        $SingleProduct->SetProductDetailUrl($item->find("a[class=hit-ss-logger somn-track prodLink hashAdded]",0)->href);
        
        echo $item->find("a[class=hit-ss-logger somn-track prodLink hashAdded]",0)->href;
        
	foreach($item->find('p[class=product-title]') as $title){	
			$SingleProduct->SetProductName($title->plaintext);
                        //echo $SingleProduct->GetProductName();
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
                else{
			$SingleProduct->SetProductBeforeDiscounePrice("NA");
			$SingleProduct->SetDiscountDetails("NA");
                }
                
		if($priceData->find("p[class=emiMonthsHoverGrid]",0)!=NULL){
			$SingleProduct->SetEmi("1");
			$emidetails=$priceData->find("p[class=emiMonthsHoverGrid]",0)->plaintext;
			$SingleProduct->SetEmiDetails($emidetails);
			//echo $priceData->find("p[class=emiMonthsHoverGrid]",0)->plaintext;
		}
                else{
                        $SingleProduct->SetEmi("NA");			
			$SingleProduct->SetEmiDetails("NA");
                }
		
		if($priceData->find("div[class=ratingStarsSmall corrClass8] span[class=lfloat fnt12 ratingCount]",0)!=NULL){
			$SingleProduct->SetProductRating($priceData->find("div[class=ratingStarsSmall corrClass8] span[class=lfloat fnt12 ratingCount]",0)->plaintext);
                        //echo $SingleProduct->GetProductRating();
		}
                else{
                        $SingleProduct->SetProductRating("NA");
                }
	}
	 
        //echo "Let's Insert---->\n";
        
	$features=$item->find("div[class=lfloat product_list_view_highlights]",0);
        
        if($features!=NULL){
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
            //echo $conDataAll."</br>";        
            $SingleProduct->SetProductFeatures($conDataAll);
        }
        else{
            $SingleProduct->SetProductFeatures("NA");
        }

        //echo $SingleProduct->GetProductDetailUrl();
	//echo $SingleProduct->GetProductPrice()."dis-price".$SingleProduct->GetProductBeforeDiscounePrice()."dis_percen".$SingleProduct->GetDiscountDetails()."</br>"."EMI Has:".$SingleProduct->GetEmi()."EMI Details".$SingleProduct->GetEmiDetails()."Features : ".$SingleProduct->GetProductFeatures()."HREF: ".$SingleProduct->GetProductDetailUrl();
      
       $DataAccess = new DataaccessHelper();     
       clsProductsManager::InsertProducts($SingleProduct);
      
}


?>