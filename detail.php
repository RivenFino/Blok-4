<link rel="stylesheet" href="css/kategori.css">
<link rel="stylesheet" href="css/detail.css">
<div class="atas">
    <?php
        $kategori_id=@$_GET['kategori_id'];
        echo kategori($kategori_id);
    ?>
</div>

<div id="atas">
    <?php
    $barang_id = $_GET['barang_id'];

    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
    $row = mysqli_fetch_assoc($query);

    echo "<div id='detail-barang'>
                <h2>$row[nama_barang]</h2>
                <div id='frame-gambar'>
                    <img id='gambar' src='" . BASE_URL . "image/barang/$row[gambar]' />
                </div>
                <div id='frame-harga'>
                    <div class='box-1'>
                        <span>" . rupiah($row['harga']) . "</span>
                        <a class='tombol-pink' href='" . BASE_URL . "tambah_keranjang.php?barang_id=$row[barang_id]'>Tambah Ke Keranjang</a>
                    </div>
                </div>
                <div id='keterangan'>
                    <b>Keterangan : </b> $row[spesifikasi]
                </div>
            </div>";
    ?>
</div>