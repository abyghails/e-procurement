<?php
// Require composer autoload
require_once __DIR__ . '/../../../assets/vendor/autoload.php';

require_once "../../../../proses/koneksi/koneksi.php";

// data
$id = $_GET["id"];
$tbKembalian = query("SELECT * FROM tb_kembalian WHERE id = $id");
$kode_transaksi = $tbKembalian[0]["kode_transaksi_kembalian"];

// ambil data transaksi
$transaksiData = query("SELECT * FROM tb_barang INNER JOIN tb_transaksi ON tb_transaksi.barang_id = tb_barang.id WHERE kode_transaksi = '$kode_transaksi'");

// data user
$user_id = $transaksiData[0]["user_id"];
$userData = query("SELECT * FROM users WHERE id = $user_id");

// data untuk total
$counting = query("SELECT SUM(total_harga) AS jumlah FROM tb_transaksi WHERE kode_transaksi = '$kode_transaksi'");

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(["mode" => "utf-8", "format" => 	[120, 100], "margin_top" => 3, "margin_left" => "5", "margin_right" => "5"]);

// html 
$html = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Nota Transaksi ' . $kode_transaksi . '</title>
</head>
<body>
	<div class="header">
		<div class="kode">Kode Transaksi : ' . $kode_transaksi . '</div>
		<div class="tanggal">Tanggal : ' . $tbKembalian[0]["tanggal_transaksi"] . '</div>
		<div class="border"></div>
	</div>
	<div class="table"></div>
		<table cellspacing="0" cellpadding="4" align="center">
			';

$i = 1;
foreach ($transaksiData as $cool) {
	$format_uang = number_format($cool["harga_barang"], 0, ",", ".");
	$format_total = number_format($cool["total_harga"], 0, ",", ".");
	$html .= '
				<tr>
					<td width="190" style="font-size: 14px;">' . $cool["nama_barang"] . '</td>
					<td style="font-size: 14px;">' . $cool["jumlah_beli"] . '</td>
					<td style="font-size: 14px;">Rp. ' . $format_uang . '</td>
					<td style="font-size: 14px;">Rp. ' . $format_total . '</td>
					</tr>
				';
}
$html .= '
				<tr>
				<td style="border-top: 1px solid black;"></td>
				<td style="border-top: 1px solid black;"></td>
				<td style="border-top: 1px solid black;"></td>
				<td style="border-top: 1px solid black;"></td>
				</tr>
				<tr>
					<td colspan="3" style="text-align:right; font-size: 14px;">Total Harga</td>
					<td style="font-size: 14px; font-weight: bold;">Rp ' . number_format($counting[0]["jumlah"], 0, ",", ".") . '</td>
				</tr>
				<tr>
					<td colspan="3" style="text-align:right; font-size: 14px;">Bayar</td>
					<td style="font-size: 14px; font-weight: bold; color: #FF5A00;">Rp ' . number_format($tbKembalian[0]["bayar"], 0, ",", ".") . '</td>
				</tr>
				<tr>
					<td colspan="3" style="text-align:right; font-size: 14px;">Kembalian</td>
					<td style="font-size: 14px; font-weight: bold; color: #1aee30;">Rp ' . number_format($tbKembalian[0]["kembalian"], 0, ",", ".") . '</td>
				</tr>
		</table>
	</div>
</body>
</html>';


// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('Transkasi-' . $kode_transaksi . '.pdf', "D");
// $mpdf->Output("harga-barang.pdf", "D");
