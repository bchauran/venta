<?php

	session_start();
	//print_r($_SESSION["cart"]);
	//$paypal_business = "softreligion@gmail.com";
	$paypal_business = "sb-cuqy02361188@business.example.com";
	$paypal_currency = "USD";
	$paypal_cursymbol = "&usd";
	//$paypal_location = "MX";
	$paypal_returnurl = "http://localhost/paypal/done.php";
	$paypal_returntxt = "Pago Realizado Exitosamente!";
	$paypal_cancelurl = "http://localhost/paypal/cancel.php";

	require_once('base1.php');


	$connexion2 = new base();

    $conex2=$connexion2->conecta();

    $cart = array("C-04","C-08","C-03","C-05");

    //$cart = json_decode($_POST['array_con_codigos_paypal']);


	// complete the return and cancel URL

	//	$paypal_returnurl .= "&id=".$b[1]."&k=$k";
	//	$paypal_cancelurl .= "&id=".$b[1]."&k=$k";

	// from wc
	// https://www.paypal.com/cgi-bin/webscr?cmd=_cart&business=evilnapsis%40gmail.com&no_note=1&currency_code=USD&charset=utf-8&rm=1&upload=1&return=http%3A%2F%2Flocalhost%2Fwp%2Fcheckout%2Forder-received%2F76%3Fkey%3Dwc_order_567671a554da3%26%23038%3Butm_nooverride%3D1&cancel_return=http%3A%2F%2Flocalhost%2Fwp%2Fcart%2F%3Fcancel_order%3Dtrue%26%23038%3Border%3Dwc_order_567671a554da3%26%23038%3Border_id%3D76%26%23038%3Bredirect%26%23038%3B_wpnonce%3Dd2d1c85888&page_style=&paymentaction=sale&bn=WooThemes_Cart&invoice=WC-76&custom=%7B%22order_id%22%3A76%2C%22order_key%22%3A%22wc_order_567671a554da3%22%7D&notify_url=http%3A%2F%2Flocalhost%2Fwp%2Fwc-api%2FWC_Gateway_Paypal%2F&first_name=Agustin&last_name=Ramos&company=&address1=Cardenas&address2=&city=Cardenas&state=CA&zip=86680&country=US&email=evilnapsis%40gmail.com&night_phone_a=222&night_phone_b=0&night_phone_c=0&day_phone_a=222&day_phone_b=0&day_phone_c=0&no_shipping=1&item_name_1=Laptop+HP&quantity_1=1&amount_1=100.00&item_number_1=&tax_cart=0.00
	// https://www.paypal.com/cgi-bin/webscr?cmd=_cart&business=&no_note=1&currency_code=USD&charset=utf-8&rm=1&upload=1&business=&return=http%3A%2F%2Flocalhost%2Fkatana-pro%2F%3Faction%3Dppdone%26id%3D0%26k%3DSJj6_c7ClhF&cancel_return=http%3A%2F%2Flocalhost%2Fkatana-pro%2F%3Faction%3Dppcancel%26id%3D0%26k%3DSJj6_c7ClhF&page_style=&paymentaction=sale&bn=katanapro_cart&invoice=KP-0

	//$ppurl = "https://www.paypal.com/cgi-bin/webscr?cmd=_cart";

	//$ppurl = "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_cart";
	$ppurl = "https://www.paypal.com/cgi-bin/webscr?cmd=_cart";
	//$ppurl = "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_xclick";
	
    //$ppurl .= "&upload=1";
	$ppurl .= "&business=".$paypal_business;
	$ppurl .= "&no_note=1";
	$ppurl .= "&currency_code=".$paypal_currency;
	$ppurl .= "&charset=utf-8&rm=1&upload=1";
	$ppurl .= "&business=".$paypal_business;
	$ppurl .= "&return=".urlencode($paypal_returnurl);
	$ppurl .= "&cancel_return=".urlencode($paypal_cancelurl);
	$ppurl .= "&page_style=&paymentaction=sale&bn=katanapro_cart&invoice=KP-$b[1]";

		//echo $ppurl;

	$i=1;
	//foreach ($_SESSION["cart"] as $c) {

	//echo"<br><br><br>";

	foreach ($cart as $c) {

		   $result = $conex2->query("SELECT * FROM productos where codigo_p = '$c'");

		   $row= mysqli_fetch_array($result);

		   //$q = $c["product_quantity"];
		   $q = $row["id"];

		  // $row['categoria']

		//$ppurl.="&item_name_$i=".urlencode($c["product_name"])."&quantity_$i=$q&amount_$i=".$c["product_price"]."&item_number_$i=";

        /*

		echo"<br>nombre producto".$row["nompro"]."<br>";
		echo"precio producto".$row["precio"]."<br>";
		echo"cantidad".$row["id"]."<br>";

		*/


		$ppurl.="&item_name_$i=".urlencode($row["nompro"])."&quantity_$i=$q&amount_$i=".$row["precio"]."&item_number_$i=";

        //$ppurl.="&item_name_$i=$q1&quantity_$i=$q2&amount_$i=$q3&item_number_$i=";

		$i++;

	}

	$ppurl.= "&tax_cart=0.00";

//	echo urldecode("http%3A%2F%2Flocalhost%2Fwp%2Fcheckout%2Forder-received%2F76%3Fkey%3Dwc_order_567671a554da3%26%23038%3Butm_nooverride%3D1");
//	$ppurl .= "&business=".$paypal_business;
//unset($_SESSION["cart"]);

header("Location: $ppurl");
	//	Core::redir($ppurl);


?>