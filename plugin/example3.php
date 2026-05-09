<?php

$html = "Mã đơn: #".$madon."<br>";
$filename = "newpdffile";

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A6', 'landscape');

// Render the HTML as PDF
$dompdf->render();

$output = $dompdf->output();
file_put_contents($madon.$userdon.".pdf", $output);
$file=$madon.$userdon.".pdf";

$currentFilePath = $file;
$newFilePath = '../uploads/pdf/'.$file;
$fileMoved = rename($currentFilePath, $newFilePath);


?>