<?php
set_time_limit(0);
include_once('../simple_html_dom.php');
include_once ('../objects/cls_product_spec.php');
include_once ('../Manager/clsProductSpecManager.php');

$TableName = "antiques_&_collectibles";
$ProductUrls=clsProductSpecManager::GetAllProductURL($TableName);
foreach($ProductUrls as $temp_URL){

	if($temp_URL!=NULL)
	{
		//echo "<pre>";
		//print_r ($temp_URL);
		//echo "<pre>";
		$url=$temp_URL['product_details_url'];
		
		$id=$temp_URL['product_id'];
		
		echo $url.">>".$id."</br>";
		
		
		GetUrlData($url,$id);
		
	}
}

function GetUrlData($url,$productId){
echo "Test1";
$innerHtml = file_get_html($url);
$ProductArray=NULL;
$SingleProduct=NULL;
echo $innerHtml;
echo "Test2";

foreach($innerHtml->find('div[class=comp comp-product-specs]') as $mitem)
 {

  $SingleProduct=new productspec();
  $SingleProduct->SetProductID($productId);
  $SingleProduct->SetTableName($TableName);  
	foreach($mitem->find('div[class=spec-section expanded]') as $item)
    {      
        foreach($item->find('div[class=spec-title-wrp]') as $item_title){
          //echo $item_title;
          $SingleProduct->SetProductSpecType($item_title->plaintext);
        }

        foreach ($item->find('div[class=spec-body]') as $item_body){

        if($item_body->find('ul')){
                                    $type_list_data_combined="";
            
                                      foreach ($item_body->find('ul li') as $item_spec_li_data) {
                                                  //echo "This list data: ". $item_spec_li_data;
                                                  $type_list_data_combined.=$item_spec_li_data->plaintext .",";
                                             }
                                          
                                          //echo "List Combined data : ". $type_list_data_combined;     
                                          $SingleProduct->SetProductData(rtrim($type_list_data_combined, ","));                                        
                                    }
          else {
            //echo "this is full tex :".$item_body;
            $SingleProduct->SetProductData($item_body->plaintext);
          }
        }
		
       $DataAccess = new DataaccessHelper();     
       clsProductSpecManager::InsertProducts($SingleProduct);
    }
 
}
}

	   
?>