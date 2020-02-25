<?php
	
require_once '../lib/dompdf/autoload.inc.php';
require_once '../src/InvoiceGenerator.php';

use Dompdf\Dompdf;
use MamunAmin\InvoiceGenerator;


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

$test = new InvoiceGenerator();

$html =  $test->generate($customerInfo, $shopInfo, $productInfo);

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();
