<?php
require_once "../../../../proses/koneksi/koneksi.php";

$id = $_POST["id"];
$delete = mysqli_query($koneksi, "DELETE FROM tb_sementara WHERE id = $id");
