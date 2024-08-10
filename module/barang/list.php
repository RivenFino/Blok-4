<div id="frame-tambah">
    <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=form" ?>" class="tombol-action">+ Tambah barang</a>
</div>
<?php
$query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id = kategori.kategori_id ORDER by nama_barang ASC");

if (mysqli_num_rows($query) == 0) {
    echo "<h3>Saat ini belum ada data pada table barang</h3>";
} else { ?>
    <table class="table-list">
        <tr class="baris-title">
            <th class="kolom-nomor">No</th>
            <th class="kiri">Barang</th>
            <th class="kiri">Kategori</th>
            <th class="kiri">Harga</th>
            <th class="tengah">Status</th>
            <th class="tengah">Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
            echo
            "<tr>
                <td class='kolom-nomor'>$no</td>
                <td class='kiri'>$row[nama_barang]</td>
                <td class='kiri'>$row[kategori]</td>
                <td class='kiri'>".rupiah($row["harga"])."</td>
                <td class='tengah'>$row[status]</td>
                <td class='tengah'><a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>Sunting</a></td>
            </tr>";
            $no++;
        } ?>
    </table>
<?php } ?>