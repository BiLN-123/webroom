<?php

// Optionally define the filesystem path to your system fonts
// otherwise tFPDF will use [path to tFPDF]/font/unifont/ directory
// define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");
define('IN_SITE',true);
$rootpath = '../../';
require($rootpath.'/libs/core.php');
require('../../libs/library/tfpdf.php');

// bill
$objHoadon = new Hoadon();
$hoadon = $objHoadon->getRow($id);
$objPhongtro = new Phongtro();
$phongtro = $objPhongtro->getRow($hoadon['phongtro_ma']);
// print

$pdf = new tFPDF();
$pdf->AddPage();
/*output the result*/

/*set font to arial, bold, 14pt*/
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->AddFont('DejaVuBold','','DejaVuSansCondensed-Bold.ttf',true);
$pdf->SetFont('DejaVuBold','',11);
/*Cell(width , height , text , border , end line , [align] )*/
$pdf->Cell(40, 10, 'Hóa đơn ' . date("m/Y", strtotime($hoadon['ngaytao'])), 0, 1, 'C');
$pdf->SetFont('DejaVuBold', '', 15);
$pdf->Cell(125, 5, 'Phòng: ' . $phongtro['tenphongtro'], 0, 1);
// new table
$pdf->SetFont('DejaVuBold', '', 9);
$pdf->Cell(12, 6, 'Điện', 0, 1, 'L');
$pdf->Cell(12, 6, 'CS Cũ', 1, 0, 'L');
$pdf->Cell(12, 6, 'CS Mới', 1, 0, 'L');
$pdf->Cell(10, 6, ' T.thụ', 1, 1, 'L');
$pdf->SetFont('DejaVu', '', 9);
$pdf->Cell(12, 6, $hoadon['chisodiencu'], 1, 0, 'L');
$pdf->Cell(12, 6, $hoadon['chisodienmoi'], 1, 0, 'L');
$pdf->Cell(10, 6, $hoadon['chisodienmoi'] - $hoadon['chisodiencu'], 1, 1, 'L');
$pdf->Cell(50, 2, '', 0, 1);

// new table
$pdf->SetFont('DejaVuBold', '', 9);
$pdf->Cell(10, 6, 'Nước', 0, 1, 'L');
/*Heading Of the table*/
$pdf->Cell(12, 6, 'CS Cũ', 1, 0, 'L');
$pdf->Cell(12, 6, 'CS Mới', 1, 0, 'L');
$pdf->Cell(10, 6, ' T.thụ', 1, 1, 'L');
/*Heading Of the table end*/
$pdf->SetFont('DejaVu', '', 9);
$pdf->Cell(12, 6, $hoadon['chisonuoccu'], 1, 0, 'L');
$pdf->Cell(12, 6, $hoadon['chisonuocmoi'], 1, 0, 'L');
$pdf->Cell(10, 6, $hoadon['chisonuocmoi'] - $hoadon['chisonuoccu'], 1, 1, 'L');
$pdf->Cell(50, 2, '', 0, 1);
// tien dien
$pdf->Cell(16, 4, 'Tiền điện:', 0, 0);
$pdf->Cell(35, 4, number_format(($hoadon['chisodienmoi'] - $hoadon['chisodiencu']) * $hoadon['giatiendien']), 0, 1, 'L');
$pdf->Cell(16, 4, 'Tiền nước:', 0, 0);
$pdf->Cell(35, 4, number_format(($hoadon['chisonuocmoi'] - $hoadon['chisonuoccu']) * $hoadon['giatiennuoc']), 0, 1, 'L');
$pdf->Cell(16, 4, 'Phí khác:', 0, 0);
$pdf->Cell(35, 4, number_format($hoadon['phidichvu']), 0, 1, 'L');
$pdf->Cell(16, 4, 'Tiền nợ:', 0, 0);
$pdf->Cell(35, 4, number_format($hoadon['tienno']), 0, 1, 'L');
$pdf->Cell(16, 4, 'Tiền rác:', 0, 0);
$pdf->Cell(35, 4, number_format($hoadon['giatienrac']), 0, 1, 'L');
$pdf->Cell(16, 4, 'Tiền trọ:', 0, 0);
$pdf->Cell(35, 4, number_format($hoadon['giaphong']), 0, 1, 'L');
$pdf->SetFont('DejaVuBold', '', 9);
$pdf->Cell(12, 6, 'T.tiền:', 0, 0);
$pdf->SetFont('DejaVuBold', '', 13);
$pdf->Cell(35, 6, number_format($objHoadon->Tinhtien($hoadon['hoadon_id'])) . "", 0, 1, 'L');
$pdf->Cell(15, 4, '', 0, 1);
$pdf->SetFont('DejaVu', '', 6);
$pdf->Cell(40, 4, '---------------------------------', 0, 1);
$pdf->Output();
?>