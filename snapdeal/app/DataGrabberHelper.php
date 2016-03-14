<!DOCTYPE html>
<html>
<head>
	<title>Data Grabber</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://raw.githubusercontent.com/padolsey/jquery.fn/master/cross-domain-ajax/jquery.xdomainajax.js"></script>
	<script type="text/javascript"> //<![CDATA[ 
	
		function GetSourceFromURL(url,id){
			$.get(url, function(data) {    
				//$('#container').html(data);
				ShowData(data.responseText,id);	
			});
		}
		
		function ShowData(data,theid)
		{
		  //alert(data);
		  //document.getElementById('debug').value = data;
		  
		  var parser=new DOMParser();
		  var xmlDoc=parser.parseFromString(data,"text/html");
		  var datafound = xmlDoc.getElementsByClassName("pdp-section product-specs");
		  var iden = theid.charAt(theid.length-1);
		  //var elements = data.getElementsByClassName('comp comp-product-specs');
		 // for(var i=0;i<datafound.length;i++){
		  
			document.getElementById('id'+iden).value = datafound[0].innerHTML;
			//$('id'+iden).html(datafound[i].innerHTML)
		 // }  
		}
	
		function SaveData(id)
		{
			  //GetSourceFromURL(url,id);
			  var tablename = "bicycles";  // this thing will come from the html in final version
			  var idName = "id"+id;
			  var idNameProdContainer = "prod_container"+id;	
			  var  postValue= document.getElementById(idName).value;
			  var classNameprod="prod"+id;
			  var elementProductID = document.getElementsByClassName(classNameprod);

			  
			  var postProdID = "";
			  //for(var i=0;i<element.length;i++)
			  // {
			     //alert(element[i].value);
			     //postValue = element[i].value;
			  // }
			   for(var i=0;i<elementProductID.length;i++)
			   {
			   	 postProdID = elementProductID[i].innerHTML;
			   }
			
			//alert(postProdID);
			//alert(tablename);
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (xhttp.readyState == 4 && xhttp.status == 200) {
			     var response = xhttp.responseText;
			     //alert(response);
			     if(response!=null)
			     {
			     	document.getElementById(idNameProdContainer).style.backgroundColor="#D4FFAA";
			     	document.getElementById(id).disabled = true;					
			     }
			    }
			  };
			
			  xhttp.open("GET", 'spec_crawler.php?value='+encodeURIComponent(postValue)+'&tablename='+encodeURIComponent(tablename)+'&id='+encodeURIComponent(postProdID), true);
			  //xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			  xhttp.send();
		}
		
		

		//]]> 
	</script>
</head>
<body>

</body>
</html>
<?php
include_once('databaseHelper.php');
$products = GetData("bicycles");
//echo "<pre>";
//print_r();
//echo "</pre>";
$i=0;
foreach ($products as $singleProduct) {
	if($singleProduct!=null)
	{	echo "<pre>";
		//print_r($singleProduct);
		echo "</pre>";
?>
		<div id="<?php echo "prod_container".$i;?>" style="border-top: 1px solid;border-bottom: 1px solid;background-color:#FF557F;">
			<div>
				<div class="<?php echo "prod".$i;?>"><?php echo $singleProduct["product_id"]; ?></div>
				<div><?php echo $singleProduct["product_name"]; ?></div>
				<div><?php echo $singleProduct["product_details_url"]; ?></div>
					<a href="<?php echo $singleProduct["product_details_url"];?>"> Open Spec </a>
				<div><textarea id="<?php echo "id".$i;?>" rows="4" cols="50"></textarea>
				
				<div style="float: right;">
					<button id="<?php echo "btn".$i; ?>" onclick="GetSourceFromURL('<?php echo $singleProduct["product_details_url"];?>',this.id)">Click me</button> 
					<!--<textarea id="<?php //echo "debug".$i;?>"></textarea>-->
				</div>
				
				<div><button id="<?php echo $i; $i++;?>" onclick="SaveData(this.id);">Save Spec</button></textarea>				
			</div>
		</div>	
<?php
	}
}


//The function below is used for getting the target list
function GetData($table_name)
{	$dbHelper = new DataaccessHelper();
	$sql= "SELECT product_id,product_name,product_details_url FROM ".$table_name." where iscompleted=0 LIMIT 10";
	//$sql = mysql_query("show tables");
	return $dbHelper->ExecuteDataSet($sql);
}

?>