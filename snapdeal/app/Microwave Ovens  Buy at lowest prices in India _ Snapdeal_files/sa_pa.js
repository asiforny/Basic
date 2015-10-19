var BA = BA||{};
BA.loadComplete = false;
BA.ieValue = 0;
BA.started = false;
var PA = PA||{};
PA.adloaded = false;
PA.loadComplete = false;
PA.ieValue = 0;
PA.started = false;
var SA = SA||{};
SA.loadConversionComplete = false;
SA.server = "sa.snapdeal.com";
SA.category = document.getElementById("sa-category");
SA.page = document.getElementById("sa-page");
SA.website = getWebsite();
SA.isIE = function() {
	  var myNav = navigator.userAgent.toLowerCase();
	  return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : 0;
	}
SA.mobileAndTabletcheck = function() {
	  var check = false;
	  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
	  return check;
	}

SA.loadConversion = function(){
	if(SA.isIE() && SA.isIE()<9){
		SA.loadConversionComplete = true;
		return;
	}
	var convClassname = "sa_adspace_conv";
	var convElems = [];
	if(document.getElementsByClassName !== "undefined") {
		convElems = document.getElementsByClassName(convClassname);
		if(convElems.length==0){
			return;
		}
	}
	
	var visitorId = getVisitorId();
	for(var i=0;i<convElems.length;i++){
		var divId = convElems[i].id;
		var adspaceId = divId.substring(convClassname.length+1);
		var server_url = document.location.protocol=="https"?"https://":"http://";
		server_url += SA.server;
		var convUrl = server_url+"/v1/snapad/pixel/conv?adspaceId="+adspaceId+"&visitorId="+visitorId;
		if(SA.mobileAndTabletcheck()){
			var sa_orderjson = document.getElementById("orderJSON").value;
			if(sa_orderjson!=="undefined"){
				var orderObj = JSON.parse(sa_orderjson);
				sa_oid =  orderObj.id;
				sa_val  = orderObj.sellingPrice;
				if(orderObj.suborders instanceof Array){
					for(var j=0;j<orderObj.suborders.length;j++){
						window["sa_seller_"+(j+1)] = orderObj.suborders[j].vendorCode;
						window["sa_brand_"+(j+1)] = orderObj.suborders[j].supcCode;
						window["sa_val_"+(j+1)] = orderObj.suborders[j].sellingPrice;
					}
				}
			}
			
		}else{
			sa_val = 0;
			if(typeof orderSellingPrices!=="undefined"){
				if(orderSellingPrices instanceof Array){
					for(var j=0;j<orderSellingPrices.length;j++){
						window["sa_val_"+(j+1)] = orderSellingPrices[j];
						sa_val += +orderSellingPrices[j];
					}
				}
				if(orderPOGIds instanceof Array){
					for(var j=0;j<orderPOGIds.length;j++){
						window["sa_brand_"+(j+1)] = orderPOGIds[j];
					}
				}
				var orderIdElems = [];
				if(document.getElementsByClassName !== "undefined") {
					orderIdElems = document.getElementsByClassName("order-id");
					if(orderIdElems.length>0){
						var orderIdElem = orderIdElems[0].innerHTML;
						orderIdElem = orderIdElem.substring(orderIdElem.indexOf(":")+1);
						sa_oid = orderIdElem.trim();
					}
				}
				
				if(typeof sa_oid=="undefined" || sa_oid==""){
					if(typeof s !=="undefined" && typeof s.purchaseID !=="undefined"){
						sa_oid = s.purchaseID;
					}
				}
				if(typeof s !=="undefined" && typeof s.prop61 !=="undefined"){
					var venderCodeArr = s.prop61;
					venderCodeArr = venderCodeArr.trim();
					var vcArr = venderCodeArr.split(",");
					var vcNewArr = new Array();
					for(var j=0;j<vcArr.length;j++){
						if(vcArr[j]!=""){
							vcNewArr.push(vcArr[j]);
						}
					}
					for(var j=0;j<vcNewArr.length;j++){
						
						window["sa_seller_"+(j+1)] = vcNewArr[j];
					}
				}
			}
		}
		if(typeof sa_oid!=="undefined" && sa_oid!=""){
			convUrl += "&oid="+sa_oid;
		}
		if(typeof sa_val!=="undefined" && sa_val!=""){
			convUrl += "&val="+sa_val;
		}
		if(typeof sa_seller_1!=="undefined" && sa_seller_1!=""){
			convUrl += "&seller1="+sa_seller_1;
		}
		if(typeof sa_brand_1!=="undefined" && sa_brand_1!=""){
			convUrl += "&brand1="+sa_brand_1;
		}
		if(typeof sa_val_1!=="undefined" && sa_val_1!=""){
			convUrl += "&val1="+sa_val_1;
		}
		if(typeof sa_seller_2!=="undefined" && sa_seller_2!=""){
			convUrl += "&seller2="+sa_seller_2;
		}
		if(typeof sa_brand_2!=="undefined" && sa_brand_2!=""){
			convUrl += "&brand2="+sa_brand_2;
		}
		if(typeof sa_val_2!=="undefined" && sa_val_2!=""){
			convUrl += "&val2="+sa_val_2;
		}
		if(typeof sa_seller_3!=="undefined" && sa_seller_3!=""){
			convUrl += "&seller3="+sa_seller_3;
		}
		if(typeof sa_brand_3!=="undefined" && sa_brand_3!=""){
			convUrl += "&brand3="+sa_brand_3;
		}
		if(typeof sa_val_3!=="undefined" && sa_val_3!=""){
			convUrl += "&val3="+sa_val_3;
		}
		var convPixel = "<img border='0' width='1' height='1' src='"+convUrl + "'></img>";
		convElems[i].innerHTML = convPixel;
		SA.loadConversionComplete = true;
	}
}

 function track(event){
	event = event || window.event;
	var x = event.pageX;
	var y = event.pageY;
	var elem = this.document.activeElement;
	var rect = elem.getBoundingClientRect();
	var relx = x - rect.left;
	var rely = y - rect.top;
	var u = elem.getAttribute("href");
	u += "&relx="+relx+"&rely="+rely;
	elem.setAttribute("href",u);
	return true;
}

 function getVisitorId() {
	var visitorId = getCookie("vid");
	if (visitorId != "") {
		return visitorId;
	}
	var ua = navigator.userAgent;
	var scr = screen.width + "," + screen.height + "," + screen.colorDepth
			+ "," + screen.pixelDepth;
	var pld = "";
	for ( var plugin in navigator.plugins) {
		pld += JSON.stringify(plugin)+ "|";
	}
	var sig = ua+";"+scr+";"+pld;
	var csig = hash(sig);
	var d = new Date();
	var csigTimeStamp = csig+"-"+d.getTime();
	setCookie("vid", csigTimeStamp, 1000, "/");
	return csigTimeStamp;
}

 function hash(s){
	var hs = 0;
	for(var i=0;i<s.length;i++){
		var c = s.charCodeAt(i);
		hs = ((hs << 5) - hs) + c;
		hs |= 0;
	}
	return hs;
}

function setCookie(cname, cvalue, exdays, domainpath) {
	var d = new Date();
	var seconds = exdays * 24 * 60 * 60 * 1000;
	d.setTime(d.getTime() + seconds);
	var expires = "expires=" + d.toUTCString();
	//var maxage = "maxage=" + seconds;
	var path = "domain=.snapdeal.com;path=/";
	var ck = cname + "=" + cvalue + "; " + expires + ";"  + path;
	document.cookie = ck;
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ')
			c = c.substring(1);
		if (c.indexOf(name) == 0)
			return c.substring(name.length, c.length);
	}
	return "";
}

function getWebsite() {
	var websiteName = document.location.host.split(":")[0];
	if(typeof String.prototype.startsWith != 'function') {
		String.prototype.startsWith = function (str){
		    return this.slice(0, str.length) == str;
		  };
	}
	if(websiteName.startsWith("m") && websiteName.endsWith("snapdeal.com")) {
		return "m.snapdeal.com";
	} 
	if(!websiteName.startsWith("m") && websiteName.endsWith("snapdeal.com")) {
		return "www.snapdeal.com";
	}
	return websiteName;
}

BA.load = function(forced) {
	if(typeof(forced) === 'undefined') forced = false;
	BA.ieValue = SA.isIE();
	if(BA.ieValue > 0 && BA.ieValue < 9){
		BA.loadComplete = true;
		return;
	}
	var classname = "sa_adspace";
	var adElems = [];
	if(document.getElementsByClassName !== "undefined") {
		adElems = document.getElementsByClassName(classname);
		if(adElems.length==0){
			return;
		}
	}
	
	var visitorId = getVisitorId();
	var cb = Math.round(Math.random()*1000000000);
	var server_url = document.location.protocol=="https"?"https://":"http://";
	server_url += SA.server;
	var url = server_url+"/v1/snapad/banners?vid="+visitorId+"&cb=" + cb;
	var adspace_count = 0;
	var exclude_ads = "";
	for(var i=0;i<adElems.length;i++){
		var divId = adElems[i].id;
		var adspaceId = divId.substring(classname.length+1);
		if(forced || adElems[i].innerHTML == "") { 
			url+= "&adspaceId="+ adspaceId;
			adspace_count++;
		} else { 
			exclude_ads += "&xadid=" + adspaceId;
		}
	}
	if(adspace_count == 0) {
		return;
	}
	if(typeof BA.uniqueAds === "undefined") BA.uniqueAds = false; 
	if(BA.uniqueAds == "true"){
		url += exclude_ads;
	}	
	if(typeof SA.category!=="undefined" && SA.category!= null){
		url += "&category="+SA.category.getAttribute("value");
	}
	if(typeof SA.page!=="undefined" && SA.page!= null){
		url += "&page="+SA.page.getAttribute("value");
	}
	if(typeof SA.brand!=="undefined" && SA.brand!=""){
		url += "&brand="+SA.brand;
	}
	if(typeof SA.keyword!=="undefined" && SA.keyword!=""){
		url += "&keyword="+SA.keyword;
	}
	if(typeof SA.website!=="undefined" && SA.website!="") {
		url += "&website=" + SA.website;
	}
	
	var isIE9 = window.XDomainRequest ? true : false;
	var xmlhttp;
	if(BA.ieValue == 9 && isIE9){
		xmlhttp = new XDomainRequest();
		xmlhttp.open("GET", url);
	}else{
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", url, true);
	}

	xmlhttp.onerror = function() {
            console.log("banner ad http failed");
        };
	xmlhttp.onload = function() {
		if (BA.ieValue == 9 || (this.readyState == 4 && this.status == 200)) {
			var bannerjsonArr = JSON.parse(this.responseText);
			if((typeof bannerjsonArr === "undefined")||bannerjsonArr==""){
				return;
			}
			for(var i=0;i<bannerjsonArr.length;i++){
				var bannerjson = bannerjsonArr[i];
				if((typeof bannerjson === "undefined")||bannerjson==""||(typeof bannerjson.adspaceId === "undefined")||bannerjson.adspaceId==""){
					continue;
				}
				if(bannerjson.type=="IMG"){
					var currentId =classname+"_"+bannerjson.adspaceId;
					var click_url = bannerjson.click_url;
					if(typeof SA.page!=="undefined" && SA.page!= null){
						click_url += "&page="+SA.page.getAttribute("value");
					}
					var html = "<a href='" + click_url
					+ "' target='"+ bannerjson.target + "' onClick='return track(event)'>";
					html += "<img border='0' ";
					if(!SA.mobileAndTabletcheck()){
						html += "width='" + bannerjson.width +"' height='" + bannerjson.height+"'";
					}
					html+=  " src='"+ bannerjson.image_url + "'></img>";
					html += "<img border='0' width='1' height='1' src='"
						+ bannerjson.pixel_url + "' style='position: absolute; opacity: 0;width: 1px;height: 1px;'></img>";
					html += "</a>";
					document.getElementById(currentId).innerHTML = html;
					document.getElementById(currentId).setAttribute("xaid", bannerjson.adId);
				}else if(bannerjson.type=="HTML"){
					document.getElementById(classname+"_"+bannerjson.adspaceId).innerHTML = bannerjson.html;
					document.getElementById(classname+"_"+bannerjson.adspaceId).setAttribute("xaid", bannerjson.adId);
				}
			}
			BA.loadComplete = true;
		}
	};
	xmlhttp.send();
	
};

SA.loadConversionFull = function(){
	if ((document.readyState === "loaded")|| (document.readyState === "interactive")|| (document.readyState === "complete")) {
		if(!SA.loadConversionComplete){
			SA.loadConversion();
		}
    }else{
    	setTimeout(SA.loadConversionFull, 1000);
    }
}

PA.load = function(forced) {
	if(typeof(forced) === "undefined") forced = false;
	PA.ieValue = SA.isIE();
	if(PA.ieValue>0 && PA.ieValue<9){
		PA.loadComplete = true;
		return;
	}
	var pageName = "";
	if(typeof SA.page!=="undefined" && SA.page!= null) {
		pageName = SA.page.getAttribute("value");
	}
	if(pageName == "category-page"){
		if(PA.ieValue == 9){
			return;
		}
		var lws1 = document.getElementsByClassName("sa_pa_lw1");
		var arrLength = lws1.length;
		if(arrLength > 0){
			lws1[arrLength-1].style.display = "none";
		}
		/* Disable Ads on Category Listing with any active filters */
		if(!(document.location.hash == "")) {
			return;
		}
	}
	var classname = "sa_pa";
	var adElems = [];
	if(document.getElementsByClassName !== "undefined") {
		adElems = document.getElementsByClassName(classname);
		if(adElems.length==0){
			return;
		}
	}
	var visitorId = getVisitorId();
	var cb = Math.round(Math.random()*1000000000);
	var server_url = document.location.protocol=="https"?"https://":"http://";
	server_url += SA.server;
	var url = server_url+"/v1/sa/pro/ads?vid="+visitorId+"&cb=" + cb;
	var adspace_count = 0;
	var xaids = "";
	for(var i=0;i<adElems.length;i++){
		var divId = adElems[i].id;
		var adspaceId = divId.substring(classname.length+1);
		var xaid = adElems[i].xaid;
		if(forced || adElems[i].innerHTML == "") { 
			url+= "&adspaceId="+ adspaceId;
			adspace_count++;
		}  else {
			xaids += "&xadid=" + xaid;
		}
	}
	if(adspace_count == 0) { 
		return;
	}
	if(typeof BA.uniqueAds === "undefined") BA.uniqueAds = false; 
	if(BA.uniqueAds == "true"){
		url += exclude_ads;
	}	
	if(typeof SA.category!=="undefined" && SA.category!= null){
		url += "&category="+SA.category.getAttribute("value");
	}
	if(typeof SA.page!=="undefined" && SA.page!= null){
		url += "&page="+SA.page.getAttribute("value");
	}
	if(typeof SA.brand!=="undefined" && SA.brand!=""){
		url += "&brand="+SA.brand;
	}
	if(typeof SA.keyword!=="undefined" && SA.keyword!=""){
		url += "&keyword="+SA.keyword;
	}
	if(typeof SA.website!=="undefined" && SA.website!= "") {
		url += "&website=" + SA.website;
	}
	
	var isIE9 = window.XDomainRequest ? true : false;
	var xmlhttp;
	if(PA.ieValue == 9 && isIE9){
		xmlhttp = new window.XDomainRequest();
		xmlhttp.open("GET", url);
	}else{
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", url, true);
	}
	
	xmlhttp.send();
	xmlhttp.onerror = function() {
        console.log("product ad http failed");
    }
	xmlhttp.onload = function() {
		if (PA.ieValue == 9 || (this.readyState == 4 || this.status == 200)) {
			var bannerjsonArr = JSON.parse(this.responseText);
			var minAds = 0;
			var imgW = 150;
			var imgH = 176;
			var width = 155;
			if(document.getElementById("sa-min-products") != null) { 
				minAds = document.getElementById("sa-min-products").getAttribute("value");
			}
			if(minAds > 0){ 
				width = 620/minAds;
				if (minAds == 3){
					imgW = 200;
					imgH = 235;
				}
			}
			
			if((typeof bannerjsonArr === "undefined") || bannerjsonArr== ""){
				return;
			}
			if(typeof minAds !=="undefined" && minAds != "") {
				if(bannerjsonArr.length < minAds) {
					return;
				} else {
					if(pageName == "category-page") {
						var lws = document.getElementsByClassName("sa_pa_lw1");
						for(var i = 0; i < lws.length; i++){
							if(lws[i].style.display == "none" || lws[i].style.display == "") {
								lws[i].style.display = "table";
								break;
							}
						}
					}
				}
			}
			for(var i=0;i<bannerjsonArr.length;i++){
				var bannerjson = bannerjsonArr[i];
				if((typeof bannerjson === "undefined")||bannerjson==""||(typeof bannerjson.adspaceId === "undefined")||bannerjson.adspaceId==""){
					continue;
				}
				var currentId =classname+"_"+bannerjson.adspaceId;
				var click_url = bannerjson.click_url;
				if(typeof SA.page!=="undefined" && SA.page!=null){
					click_url += "&page="+SA.page.getAttribute("value");
				}
				var offerPrice = bannerjson.offerPrice;
				if(offerPrice <= 0){
					offerPrice = Math.round(bannerjson.price * (100-bannerjson.discount)/100);
				}
				
				var html = "<style>.sa_pa_style {position:relative;border:1px solid #ffffff;border-radius:2px;padding:2px;text-decoration:none;} .sa_pa_style:hover{border:1px solid #fb8928;text-decoration:none;} " +
						" .sa_pa_rating{background-image:url(http://sa.sdlcdn.com/adtech/images/icons/gridstars_sprite.png);background-repeat: no-repeat;height:10px;width:58px;padding-right:5px;margin-top:5px;float:left;} a:hover{text-decoration: none;}</style>";
				if(pageName == "category-page") {
					var dis = Math.round(((bannerjson.price - bannerjson.offerPrice)/bannerjson.price)*100);
					html    += "<div style='width:" + width + "px;padding:10px 5px;float:left'>";
					html    += "<div class='sa_pa_style'>";
					html    += "<a href='" + click_url + "' target='_self'>";
					html    += "<div style='align:center;margin-bottom:5px;'><img border='0' style='width:"+ imgW + "px;height:" + imgH + "px;' ";
					html    += "src='"+ bannerjson.image_url + "'></img></div>";
					html    += "<div style='font-size: 12px;color: #212121;word-wrap: normal;font-family: robotoMedium;margin-bottom: 4px;height: 30px;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;line-height: 15px;-webkit-box-orient: vertical;overflow: hidden;margin-top: 5px;max-height: 35px;'>";
					html    += bannerjson.name + "</div>";
					html    += "<div style='position:static;margin-top:6px;'>";
					html    += "<div style='font-size:16px;font-family:robotoMedium;color:#212121;text-decoration:none;font-weight:normal;'>Rs " + offerPrice + "</div>";
					if(dis > 0) {
						html    += "<div style='color: #8c8c8c;font-size:12px;line-height:12px;padding:5px 0 0;font-family:robotoLight;text-decoration:none;'>Rs <span><strike>" + bannerjson.price +"</strike></span>";
						html    += "<span style='font-size:12px;color:#19bc9c;text-decoration:none;padding:0 5px;top:-2px;'>[" + dis + "% Off]</span></div>";
					}
					html    += "<div style='font-size:13px;color:#565656;line-height:15pt;text-align:left;font-weight:normal;display:block;margin-top:0px;'>";
					html    += "<div class='sa_pa_rating' style='background-position: 0px -" + Math.round(bannerjson.rating*2)*10 +"px;'></div>";
					html    += "<div style='float:left;'>(" + bannerjson.ratingNum + ")</div></div><div style='clear:both'></div>";
					html    += "<div style='color:#9e9e9e;font-size:12px;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;line-height:20px;font-family:robotoRegular;display:block;";
					html    += "width:" + (width - 10) + "px !important;-webkit-box-orient:vertical;'>Sold by " + bannerjson.sellerName + "</div></div>";
					html    += "<img border='0' width='1' height='1' src='" + bannerjson.pixel_url + "' style='position: absolute; opacity: 0;width: 1px;height: 1px;'></img>";
					html    += "</a></div></div>";
					
				} else {
					html    += "<div class='sa_pa_style' style='padding:5px 0px;'>";
					html    += "<a href='" + click_url + "' target='_self'>";
					html    += "<img border='0' style='align:center;max-width:100%;max-height:100%;' ";
					html    += "src='"+ bannerjson.image_url + "'></img>";
					html    += "<div style='padding:5px;'><p style='font-family:robotoRegular;font-size:13px;color:#212121;line-height:17px;-webkit-line-clamp:2;-webkit-box-orient:vertical;text-overflow: ellipsis;display:-webkit-box;overflow:hidden;max-height:50px;'>"+bannerjson.name+"</p>";
					html    += "<div class='sa_pa_rating' style='background-position: 0px -" + Math.round(bannerjson.rating*2)*10 +"px;'></div>";
					html    += "<div style='clear:left;padding-top:10px;'><span style='font-size: 12px;color:#9e9e9e;font-family:robotoLight;text-decoration:none;'> MRP Rs. </span>";
					html    += "<span style='font-size: 12px;color:#9e9e9e;font-family:robotoLight;text-decoration:line-through;'>"+bannerjson.price+"</span>";
					html    += "</div>";
					html    += "<p style='font-size:20px;color: #212121;line-height: 32px;font-family:robotoMedium;'>Rs. "+ offerPrice + "</p>";
					html    += "<span style='color: #8c8c8c;height:15px;-webkit-line-clamp:1;text-overflow:ellipsis;display:block;overflow:hidden;width:200px;";
					html    += "white-space:nowrap;-webkit-box-orient:vertical;width:100%;'>Sold By "+bannerjson.sellerName + "</span><p></div>";
					html    += "<img border='0' width='1' height='1' src='" + bannerjson.pixel_url + "' style='position: absolute; opacity: 0;width: 1px;height: 1px;'></img>";
					html    += "<div style='position:absolute;right:0px;bottom:50px;background-color:gray;color:white;padding:4px 6px;font-family:robotoRegular;'>Ad</div>";
					html    += "</a></div>";
				}
				document.getElementById(currentId).innerHTML = html;
				document.getElementById(currentId).setAttribute("xaid", bannerjson.adId);
				PA.adloaded = true;
			}
			PA.loadComplete = true;
		}
	}
};

SA.loadFull = function() { 
	if ( (document.readyState === "loaded")|| (document.readyState === "interactive")|| (document.readyState === "complete")) {
		if(!BA.loadComplete && !BA.started) { 
			BA.started = true;
			BA.load(true);
		}
		if(!PA.loadComplete && !PA.started){
			PA.started = true;
			PA.load(true);
		}
		
    }else{
    	document.onreadystatechange = this.loadFull;
    }
}

SA.loadFull();
SA.loadConversionFull();