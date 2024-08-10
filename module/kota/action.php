<?php
include_once("../../function/koneksi.php");
include_once("../../function/helper.php");

$kota = $_POST['kota'];
$tarif = $_POST['tarif'];
$status = $_POST['status'];
$button = $_POST['button'];

if ($button == "Tambah") {
    mysqli_query($koneksi, "INSERT INTO kota VALUES ('','$kota', '$tarif', '$status')");
} else if ($button == "Perbarui") {
    $kota_id = $_GET['kota_id'];
    mysqli_query($koneksi, "UPDATE kota SET kota = '$kota', tarif='$tarif', status='$status' WHERE kota_id='$kota_id'");
}


header("Location: " . BASE_URL . "index.php?page=my_profile&module=kota&action=list");
