<?php
	
require_once './vendor/autoload.php';
require_once '../src/PdfGenerator.php';

use MamunAmin\PdfGenerator;


$customerInfo = array(
	"CUSTOMER_INFO_NAME" => "Sheikh Hasina",
	"CUSTOMER_INFO_ADDRESS" => "Bijoy Sarani",
	"CUSTOMER_INFO_PHONE" => "01313019149"
);

$shopInfo = array(
	"SHOP_INFO_NAME" => "Alauddin STORE",
	"SHOP_INFO_PHONE" => "0176262621",
	"SHOP_INFO_ADDRESS" => "121, New Market, Dhaka"
);

$productInfo = array(
	[
		"PRODUCT_INFO_RATE" => "390",
		"PRODUCT_INFO_EXPIRE" => "November 19, 2021",
		"PRODUCT_INFO_SIZE" => "350 ml"
	],
	[
		"PRODUCT_INFO_RATE" => "390",
		"PRODUCT_INFO_EXPIRE" => "November 19, 2021",
		"PRODUCT_INFO_SIZE" => "350 ml"
	]
);

$test = new PdfGenerator();

$pdf =  $test->generate($customerInfo, $shopInfo, $productInfo);

