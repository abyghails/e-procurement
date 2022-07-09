<?php
// Require composer autoload
require_once __DIR__ . '/../../../assets/vendor/autoload.php';

require_once "../../../../proses/koneksi/koneksi.php";

// data
$items = query("SELECT * FROM kategori INNER JOIN tb_barang ON tb_barang.kategori_id = kategori.id ORDER BY nama_barang ASC");

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(["mode" => "utf-8", "format" => 	"A4"]);

// html 
$html = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Barang</title>
</head>
<body>
	<div class="title"><h4>Laporan Harga Barang</h4></div>
	<div class="table">
		<table border="1" cellspacing="0" cellpadding="10">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Kategori</th>
					<th>Jumlah</th>
					<th>Harga Satuan</th>
				</tr>
			</thead>
			<tbody>';

$i = 1;
foreach ($items as $item) {
	$format_uang = number_format($item["harga_barang"], 0, ",", ".");
	$html .= '
				<tr>
					<td>' . $i++ . '</td>
					<td>' . $item["kode_barang"] . '</td>
					<td>' . $item["nama_barang"] . '</td>
					<td>' . $item["nama_kategori"] . '</td>
					<td>' . $item["jumlah_barang"] . '</td>
					<td>Rp. ' . $format_uang . '</td>
				</tr>';
}
$html .= '
			</tbody>
		</table>
	</div>
</body>
</html>';


// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
// $mpdf->Output();
$mpdf->Output("harga-barang.pdf", "D");
