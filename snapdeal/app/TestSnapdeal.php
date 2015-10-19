<?php
set_time_limit(0);
include_once('../simple_html_dom.php');
$url="http://www.snapdeal.com/products/mobiles";
$innerHtml = file_get_html("file:///C:/xampp/htdocs/scrapping/snapdeal/app/testhtml.html");


foreach($innerHtml->find('div[class=product_grid_row]') as $item){
	echo $item;
	echo "<br>";
	echo "<hr>";
}

//foreach ($tt->find('section[class=rslwrp] section[class=jbbg]') as $block)

echo $innerHtml;
?>