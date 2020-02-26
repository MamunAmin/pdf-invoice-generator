<?php
	
require_once '../loader.php';

use MamunAmin\InvoicePdf\PdfGenerator;


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

$pdf = new PdfGenerator();

$invoice =  $pdf->generate($customerInfo, $shopInfo, $productInfo);
file_put_contents(__DIR__ . '/invoice.pdf', $invoice);

