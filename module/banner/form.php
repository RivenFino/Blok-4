<?php

$banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";

$banner = "";
$link = "";
$gambar = "";
$keterangan_gambar = "";
$status = "";

$button = "Tambah";

if ($banner_id != "") {

    $button = "Perbarui";

    $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id = '$banner_id'");
    $row = mysqli_fetch_array($queryBanner);

    $banner = $row["banner"];
    $link = $row["link"];
    $gambar = "<img src='" . BASE_URL . "image/slide/$row[gambar]' style='width: 200px; vertical-align: middle;' />";
    $keterangan_gambar = "(Klik 'Pilih Gambar' hanya jika tidak ingin mengganti gambar)";
    $status = $row["status"];
}
?>

<form action="<?php echo BASE_URL . "module/banner/action.php?banner_id=$banner_id" ?>" method="POST" enctype="multipart/form-data" require>

    <div class="element-form">
        <label>Banner</label>
        <span><input type="text" name="banner" value="<?php echo $banner; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Link</label>
        <span><input type="text" name="link" value="<?php echo $link; ?>" /></span>
    </div>

    <div class="element-form">
        <div class="alert"><span><?php echo $keterangan_gambar; ?></span></div>
        <label>Gambar</label>
        <span><input type="file" name="file" /><?php echo $gambar; ?></span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <input type="radio" value="on" name="status" <?php if ($status == "on") {
                                                                echo "checked";
                                                            } ?> /> On
            <input type="radio" value="off" name="status" <?php if ($status == "off") {
                                                                echo "checked";
                                                            } ?> /> Off
        </span>
    </div>

    <div class="element-form">
        <span><input type="submit" name="button" value="<?php echo $button; ?>"/></span>
    </div>
</form>