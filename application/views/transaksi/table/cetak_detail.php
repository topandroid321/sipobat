<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Topan Nurpana');
$pdf->SetTitle('Laporan Data Permintaan');
$pdf->SetSubject('Laporan');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$title = <<<EOD
<h3>Cetak Detail Pembelian</h3>
EOD;
$pdf->WriteHTMLCell(0, 0, '', '' ,$title, 0 , 1, 0, true, 'C', true);

$table = '<table style="border:1px solid #000; padding:6px;">';
 $table .= '<tr style="background-color:rgb(130, 91, 209)">
              <th style="border:1px solid #000;">No Resep</th>
              <th style="border:1px solid #000;">Nama Obat</th>
              <th style="border:1px solid #000;">Qty</th>
              <th style="border:1px solid #000;">Harga</th>
              <th style="border:1px solid #000;">Total</th>
            </tr>
           ';
  foreach ($data->result() as $row) {
    $table .='<tr>
        <td style="border:1px solid #000;">'.$row->no_resep.'</td>
        <td style="border:1px solid #000;">'.$row->nama_obat.'</td>
        <td style="border:1px solid #000;">'.$row->qty.'</td>
        <td style="border:1px solid #000;">'.$row->harga.'</td>
        <td style="border:1px solid #000;">'.$row->total.'</td>
    </tr>';
    $total=$total+$row->total;
  }
  $table .='<tr>
      <td colspan="4">Total</td>
      <td>Rp.'.$total.'</td>
  </tr>';

$table .= '</table>';
$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);
// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('cetak_detail.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
