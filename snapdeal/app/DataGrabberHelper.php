<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title>Data Grabber</title>
	<script type="text/javascript">
		function SaveData(obj)
		{
				  //var data = document.getElementById(obj.value).value;
				  var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
				    if (xhttp.readyState == 4 && xhttp.status == 200) {
				     //document.getElementById("demo").innerHTML = xhttp.responseText;
				     alert(obj.value);
				    }
				  };
				  xhttp.open("GET", "server_save_slave.php", true);
				  xhttp.send();
		}
	</script>
</head>
<body>

</body>
</html>
<?php
include_once('databaseHelper.php');
$products = GetData("bicycles");
echo "<pre>";
//print_r();
echo "</pre>";
$i=0;
foreach ($products as $singleProduct) {
	if($singleProduct!=null)
	{	echo "<pre>";
		//print_r($singleProduct);
		echo "</pre>";
?>
		<div style="border-top: 1px solid;border-bottom: 1px solid;background-color:#e5e5e5;">
			<div>
				<div><?php echo $singleProduct["product_id"]; ?></div>
				<div><?php echo $singleProduct["product_name"]; ?></div>
				<div><?php echo  $singleProduct["product_details_url"]; ?></div>
					<a href="<?php echo $singleProduct["product_details_url"];?>"> Open Spec </a>
				<div><textarea id="<?php echo $i; $i++?>" rows="4" cols="50"></textarea>
				<div><button onclick="SaveData(document.getElementById('<?echo $i;?>'))">Save Spec</button></textarea>				
			</div>
		</div>	
<?php
	}
}

function GetData($table_name)
{	$dbHelper = new DataaccessHelper();
	$sql= "SELECT product_id,product_name,product_details_url FROM ".$table_name;
	//$sql = mysql_query("show tables");
	return $dbHelper->ExecuteDataSet($sql);
}

?>