<?php
    if($user_id && $nama)
    {
        $module = isset($_GET['module']) ? $_GET['module'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        $mode   = isset($_GET['mode'])   ? $_GET['mode']   : false;
    }
    else
    {
        header("location: ".BASE_URL."index.php?page=login");
    }
?>

<link rel="stylesheet" href="css/my_profile.css">
<div id="bg-page-profile">
    <div id="menu-profile">

        <ul>
            <li>
                <a <?php if($module == "kategori"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list"; ?>">Kategori</a>
            </li>
            <li>
                <a <?php if($module == "barang"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list"; ?>">Barang</a>
            </li>
            <li>
                <a <?php if($module == "kota"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list"; ?>">Kota</a>
            </li>
            <li>
                <a <?php if($module == "user"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list"; ?>">Pengguna</a>
            </li>
            <li>
                <a <?php if($module == "banner"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=list"; ?>">Spanduk</a>
            </li>
            <li>
                <a <?php if($module == "pesanan"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>">Pesanan</a>
            </li>
        </ul>
        
    </div>
    <div id="profile-content">
        <?php 
            $file = "module/$module/$action.php";
            if (file_exists($file))
            {
                include_once($file);
            }
            else
            {
                echo "<h3> Halaman tidak ditemukan</h3> <br>";
                echo "Selamat datang kembali $nama!";
            }
        ?>
    </div>
</div>