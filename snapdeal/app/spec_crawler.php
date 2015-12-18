<?php
set_time_limit(0);
include_once('../simple_html_dom.php');
include_once ('../objects/cls_product_spec.php');
include_once ('../Manager/clsProductSpecManager.php');



$url="file:///C:/Users/simon/Desktop/try.html";
$innerHtml = file_get_html($url);

$ProductArray=NULL;
$SingleProduct=NULL;
//echo $innerHtml;

//return;
//echo 'Now:       '. date('Y-m-d') ."\n";

$counter =0;

foreach($innerHtml->find('div[class=comp comp-product-specs]') as $mitem)
 {

 //echo $mitem;

  //return;

  $SingleProduct=new productspec();
  $SingleProduct->SetProductID(101);        
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

        echo "<pre>";
          print_r($SingleProduct);
        echo "</pre>";
        echo "<hr></br>";


         
       $DataAccess = new DataaccessHelper();     
       clsProductSpecManager::InsertProducts($SingleProduct);
    }


	 }

	   
?>