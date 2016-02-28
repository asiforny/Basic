<?php
set_time_limit(0);
include_once('../simple_html_dom.php');
include_once ('../objects/cls_product_spec.php');
include_once ('../Manager/clsProductSpecManager.php');



$url="file:///C:/Users/simon/Desktop/try1.html";
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

        if($item_body->find('ul'))
		{
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
              if($item_body->find('tbody table'))
              {
                //$SingleProduct->SetProductData($item_body->plaintext);
				$type_list_data_combined2="";
				foreach($item_body->find('table[class=product-spec]') as $specInnerType)
				{		 //echo $specInnerType."<br>";
						 $specTypeStringCollector = "";
						 $specTypeStringCollector.=$specInnerType->find("tr",0)->plaintext." :";
						 //echo $specInnerType->find('tr th')->plaintext.'<br>';
																			 
						 foreach($specInnerType->find('tr') as $Typevalue)
						 {
							$pairString = "";
							//echo $Typevalue.'<br>';
							//$i=0;
							$pairString.= trim($Typevalue->find("td",0)->plaintext).":".trim($Typevalue->find("td",1)->plaintext.',');
							
							/*foreach($Typevalue->find('td') as $Perl)
							{
								 if($i>0)
								 {$pairString.=":";}
								 
								 $pairString.= trim($Perl);
								 $i++;
							}*/
							$specTypeStringCollector.=$pairString;
						 }
						
						$type_list_data_combined2.=trim($specTypeStringCollector,',');
				}				
				//echo $type_list_data_combined2.'<br>';
				$SingleProduct->SetProductData(trim($type_list_data_combined2, ','));
              }
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