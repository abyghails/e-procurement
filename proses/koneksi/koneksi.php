<?php
$koneksi = mysqli_connect("localhost", "root", "", "e-procurement");
/* 
// $koneksi = mysqli_connect("localhost", "skid2179_procurement", "joker@@@", "skid2179_procurement");
*/
if (!$koneksi) {
	die("Gagal Koneksi") . mysqli_connect_error();
}

function query($data)
{
	global $koneksi;
	$result = mysqli_query($koneksi, $data);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
