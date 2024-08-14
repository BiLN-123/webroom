<?php

// Optionally define the filesystem path to your system fonts
// otherwise tFPDF will use [path to tFPDF]/font/unifont/ directory
// define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");
define('IN_SITE',true);
$rootpath = '../../';
require($rootpath.'/libs/core.php');
require('../../libs/library/tfpdf.php');

// IN
$objhopdong = new Hopdong();
$hopdong = $objhopdong->getRow($id);
$objPhongtro = new Phongtro();
$phongtro = $objPhongtro->getRow($hopdong['phongtro_ma']);
// print
//ADD thư viện
$pdf = new tFPDF();
$pdf->AddPage();

/*set font to arial, bold, 14pt*/
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->AddFont('DejaVuBold','','DejaVuSansCondensed-Bold.ttf',true);
$pdf->SetFont('DejaVu','',8);
$pdf->Write(6,'  Cộng Hòa Xã Hội Chủ Nghĩa Việt Nam');
$pdf->SetFont('DejaVu','',7);
$pdf->Write(6,'                  Độc Lập Tự Do Hạnh Phúc');
//Xuống dòng
$pdf->LN(9);
//Title Home
$pdf->SetFont('DejaVu','',9);
$pdf->Write(6,'          HỢP ĐỒNG THUÊ TRỌ');
$pdf->Output();

?>