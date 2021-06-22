<?php
include "./../admin/validateAdmin.php";
require_once('./../vendor/autoload.php');
// reference the Dompdf namespace
use Dompdf\Dompdf;
echo "somethimg";
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$date = date("Y-m-d", time());

ob_start();
require_once('./../admin/dailyReportView.php');
$html = ob_get_clean();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("$date.pdf", array('Attachment'=>'0'));

?>
