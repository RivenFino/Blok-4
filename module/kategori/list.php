<link rel="stylesheet" href="<?php echo BASE_URL."css/kategori.css";?>" >
<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=form"; ?>" class="tombol-action"> + Tambah Kategori </a>
</div>

<?php 
    $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori ASC");

    if(mysqli_num_rows($queryKategori) == 0)
    {
        echo"<h3> Saat ini belum ada data pada tabel kategori </h3>";
    }
    else
    {
        echo "<table class='table-list'>";

        echo "<tr class='table-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kiri'>Kategori</th>
                <th class='tengah'>Status</th>
                <th class='tengah'>Aksi</th>
            </tr>";

            $no=1;
            while($row=mysqli_fetch_assoc($queryKategori))
            {
                echo "<tr>
                        <td class='kolom-nomor'><span>$no</span></td>
                        <td class='kiri'><span>$row[kategori]</span></td>
                        <td class='tengah'><span>$row[status]</span></td>
                        <td class='tengah'>
                            <a class='tombol-action' href='".BASE_URL. "index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>Sunting</a>
                        </td>
                    </tr>";
                $no++;
            }
        echo"</table>";
    }
?>