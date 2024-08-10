<?php

$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

$nama_barang = "";
$kategori_id = "";
$spesifikasi = "";
$gambar = "";
$stok = "";
$harga = "";
$status = "";
$keterangan_gambar = "";
$button = "Tambah";

if ($barang_id) {
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
    $row = mysqli_fetch_assoc($query);

    $nama_barang = $row['nama_barang'];
    $kategori_id = $row['kategori_id'];
    $spesifikasi = $row['spesifikasi'];
    $gambar = $row['gambar'];
    $stok = $row['stok'];
    $harga = $row['harga'];
    $status = $row['status'];
    $button = "Perbarui";

    $keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
    $gambar = "<img src='" . BASE_URL . "/image/barang/$gambar' style='width :200px; vertical-align: middle;' />";
}
?>

<form action="<?php echo BASE_URL . "module/barang/action.php?barang_id=$barang_id"; ?>" method="post" enctype="multipart/form-data" require>
    <div class="element-form">
        <label for="">Kategori</label>
        <span>
            <select name="kategori_id">
                <?php
                $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                while ($row = mysqli_fetch_assoc($query)) {
                    if ($kategori_id == $row['kategori_id']) {
                        echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
                    } else {
                        echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                    }
                }
                ?>
            </select>
        </span>
    </div>

    <div class="element-form">
        <label for="">Nama Barang</label>
        <span>
            <input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>">
        </span>
    </div>
    <div class="element-form">
        <label for="">spesifikasi</label>
        <span>
            <textarea name="spesifikasi"><?php echo $spesifikasi; ?></textarea>
        </span>
    </div>
    <div class="element-form">
        <label for="">Stok</label>
        <span>
            <input type="number" name="stok" value="<?php echo $stok; ?>">
        </span>
    </div>
    <div class="element-form">
        <label for="">Harga</label>
        <span>
            <input type="number" name="harga" value="<?php echo $harga; ?>">
        </span>
    </div>
    <div class="element-form">
        <label for="">Gambar Produk <?php echo $keterangan_gambar; ?> </label>
        <span>
            <input type="file" name="file"> <?php echo $gambar; ?>
        </span>
    </div>
    <div class="element-form">
        <label for="">Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if ($status == "on") {
                                                                echo "checked='true'";
                                                            } ?>> On
            <input type="radio" name="status" value="off" <?php if ($status == "off") {
                                                                echo "checked='true'";
                                                            } ?>> Off
        </span>
    </div>
    <div class="element-form">
        <span>
            <input type="submit" name="button" value="<?php echo $button; ?>">
        </span>
    </div>
</form>