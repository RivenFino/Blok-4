<?php

    include_once("function/helper.php");
    include_once("function/koneksi.php");

    session_start();

    $nama_penerima = $_POST["nama_penerima"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $alamat = $_POST["alamat"];
    $kota = $_POST["kota"];

    $user_id = $_SESSION['user_id'];
    $waktu_saat_ini = date("Y-m-d H:i:s");

    $query = mysqli_query($koneksi, "INSERT INTO pesanan (nama_penerima, user_id, nomor_telepon, kota_id, alamat, tanggal_pemesanan, status)
                                                VALUES ('$nama_penerima', '$user_id', '$nomor_telepon', '$kota', '$alamat', '$waktu_saat_ini', '0')");

    if($query)
    {
        $last_pesanan_id = mysqli_insert_id($koneksi);

        $keranjang = $_SESSION['keranjang'];

        foreach($keranjang AS $key => $value){
             
            $barang_id = $key;
            $quantity = $value['quantity'];
            $harga = $value['harga'];
            $stok = $value['stok'];
            $sisa = $stok - $quantity;

            mysqli_query($koneksi, "INSERT INTO pesanan_detail(pesanan_id, barang_id, quantity, harga)
                                                    VALUES ('$last_pesanan_id', '$barang_id', '$quantity', '$harga')");
            mysqli_query($koneksi, "UPDATE barang SET stok = '$sisa' WHERE barang_id = '$barang_id'");

            $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id = '$barang_id'");
            while($row = mysqli_fetch_assoc($query))
            {
                $stok = $row['stok'];
                $status = $row['status'];

                if($stok <= 0)
                {
                    $status = "off";
                }
                else
                {
                    $status = "on";
                }

            }
            mysqli_query($koneksi, "UPDATE barang SET status = '$status' WHERE barang_id = '$barang_id'");
            
        }

        unset($_SESSION["keranjang"]);

        header("location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$last_pesanan_id");
    }
?>