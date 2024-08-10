<div id="frame-tambah">
    <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=kota&action=form" ?>" class="tombol-action">+ Tambah kota</a>
</div>
<?php
$queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC");

if (mysqli_num_rows($queryKota) == 0) {
    echo "<h3>Saat ini belum ada data pada table kota</h3>";
} else { ?>
    <table class="table-list">
        <tr class="baris-title">
            <th class="kolom-nomor">No</th>
            <th class="kiri">kota</th>
            <th class="kiri">tarif</th>
            <th class="tengah">Status</th>
            <th class="tengah">Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($queryKota)) {
            echo
            "<tr>
                <td class='kolom-nomor'>$no</td>
                <td class='kiri'>$row[kota]</td>
                <td class='kiri'>".rupiah($row["tarif"])."</td>
                <td class='tengah'>$row[status]</td>
                <td class='tengah'><a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=kota&action=form&kota_id=$row[kota_id]'>Sunting</a></td>
            </tr>";
            $no++;
        } ?>
    </table>
<?php } ?>