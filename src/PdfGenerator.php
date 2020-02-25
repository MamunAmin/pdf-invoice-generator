<?php

namespace MamunAmin;

use Dompdf\Dompdf;
	
class PdfGenerator
{
	public function generate(Array $customerInfo, Array $shopInfo, Array $productInfo, $paper = 'A4', $type = 'portrait')
	{
		$html = $this->get_html($customerInfo, $shopInfo, $productInfo);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $type);
		$dompdf->render();
		return $dompdf->output();
	}

	public function get_html(Array $customerInfo, Array $shopInfo, Array $productInfo)
	{
		$template = file_get_contents(__DIR__ . '/../design/base-template.html');
		foreach($customerInfo as $property => $value) {
			$template = str_replace($property, $value, $template);
		}

		foreach($shopInfo as $property => $value) {
			$template = str_replace($property, $value, $template);
		}

		$total = 0;

		$product_template = '';
		foreach($productInfo as $singleProduct) {
			$product = file_get_contents(__DIR__ . '/../design/product-template.html');
			foreach($singleProduct as $property => $value) {
				$product = str_replace($property, $value, $product);
			}
			$total += $singleProduct['PRODUCT_INFO_RATE'];
			$product_template .= $product;
		}



		$template = str_replace('PRODUCT_SECTION', $product_template, $template);
		$template = str_replace('INVOICE_INFO_TOTAL', $total, $template);
		return $template;
	}
}

