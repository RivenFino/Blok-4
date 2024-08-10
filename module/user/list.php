<?php
$queryUser = mysqli_query($koneksi, "SELECT * FROM user ORDER BY user_id DESC");

if (mysqli_num_rows($queryUser) == 0) {
    echo "<h3>Saat ini belum ada data pada table user</h3>";
} else { ?>
    <table class="table-list">
        <tr class="baris-title">
            <th class="kolom-nomor">No</th>
            <th class="kiri">Level</th>
            <th class="kiri">Nama</th>
            <th class="kiri">Email</th>
            <th class="kiri">Alamat</th>
            <th class="kiri">Phone</th>
            <th class="tengah">Status</th>
            <th class="tengah">Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($rowUser = mysqli_fetch_assoc($queryUser)) {
            echo
            "<tr>
                <td class='kolom-nomor'>$no</td>
                <td class='kiri'>$rowUser[level]</td>
                <td class='kiri'>$rowUser[nama]</td>
                <td class='kiri'>$rowUser[email]</td>
                <td class='kiri'>$rowUser[alamat]</td>
                <td class='kiri'>$rowUser[phone]</td>
                <td class='tengah'>$rowUser[status]</td>
                <td class='tengah'><a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]'>Sunting</a></td>
            </tr>";
            $no++;
        } ?>
    </table>
<?php } ?>