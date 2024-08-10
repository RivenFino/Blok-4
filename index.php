<?php
    session_start();

    include_once("function/helper.php");
    include_once("function/koneksi.php");

    $page = isset($_GET['page']) ? $_GET['page'] : false;

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama    = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level   = isset($_SESSION['level']) ? $_SESSION['level'] : false;
    $keranjang   = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang   = count($keranjang);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php
          $filename = "$page.php";
          $module = isset($_GET['module']) ? $_GET['module'] : false;

          if (file_exists($filename)) {
            if ($filename == "my_profile.php") {
                echo "EXCEED | ";
              if($module == "kategori")
              {
                echo "KATEGORI";
              }
              else if($module == "barang")
              {
                echo "BARANG";
              }
              else if($module == "kota")
              {
                echo "KOTA";
              }
              else if($module == "user")
              {
                echo "PENGGUNA";
              }
              else if($module == "banner")
              {
                echo "SPANDUK";
              }
              else if($module == "pesanan")
              {
                echo "PESANAN";
              }
              else
              {
                echo "MODULE";
              }
            } else if ($filename == "collections.php") {
              echo "EXCEED | KOLEKSI";
            } else if ($filename == "login.php") {
              echo "EXCEED | MASUK";
            } else if ($filename == "register.php") {
              echo "EXCEED | DAFTAR";
            } else {
              echo "EXCEED | BERANDA";
            }
          } else {
            echo "EXCEED";
          }
          ?></title>
        <link rel="stylesheet" href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css"-->
        <link href="image/logo/logo3.png" rel="shortcut icon">
        <!--link rel="stylesheet" href="css/style.css"-->
        <link rel="stylesheet" href="<?php echo BASE_URL."css/footer.css"; ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo BASE_URL."css/modal.css"; ?>" type="text/css">

    </head>

    <body>
        <header>
            <div class="logo">
                <a href="<?php echo BASE_URL."index.php";?>">
                    <img id="logo2" src="<?php echo BASE_URL."image/logo/logo2.jpeg";?>" alt="logo" height="auto" width="140">
                    <!--h1><span>Exceed</span></h1-->
                </a>
            </div>

            <div class="search">    
                <form action="<?php echo BASE_URL."search.php";?>" method="get" autocomplete="off">
                    <input type="text" name="keyword" placeholder="Cari sesuatu">
                    <button><span><img src="<?php echo BASE_URL."image/icon/search.png";?>" alt="" height="20px" width="auto"></span></button>
                </form>
            </div>
            
            <div class="menu">
                
                <div class="keranjang">
                    <button  style="background: rgba(0, 0, 0, 0); border: none; cursor: pointer;" onclick="window.location.href='<?php echo BASE_URL . "index.php?page=keranjang"; ?>'" href=""><img src="<?php echo BASE_URL."image/icon/cart.png?>";?>" alt="Cart" height="20px" width="auto"></button>
                    <?php
                        if($totalBarang != 0)
                        {
                            echo "<span class='total-barang'>$totalBarang</span>";
                        }
                    ?>
                </div>
                    
                <div class="vertical-hr" id="vertical-hr"></div>
                
                <div>
                    <button  id="menuToggle" onclick="menuToggle()">Menu</button>
                </div>

            </div>
        </header>
        <!-------------------------------------- Content --------------------------------------------->

        <div for="modal" id="navigasi-menu" class="modal-popup">
            <div class="overlay" id="overlay-menu"></div>
            <div class="container-modal-menu">
                <div class="modal-close"><span id="menu-close">X</span></div>
                <div class="body-modal">
                    <ul class="ul">
                        <?php if($user_id && $nama){echo "
                            <li><a href='".BASE_URL."index.php?page=my_profile&module=user&action=list'>Profil Saya</a>
                                <ul>";?>
                                    <li><a <?php if($module == "kategori"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list"; ?>">Kategori</a></li>
                                    <li><a <?php if($module == "barang"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list"; ?>">Barang</a></li>
                                    <li><a <?php if($module == "kota"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list"; ?>">Kota</a></li>
                                    <li><a <?php if($module == "user"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list"; ?>">Pengguna</a></li>
                                    <li><a <?php if($module == "banner"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=list"; ?>">Spanduk</a></li>
                                    <li><a <?php if($module == "pesanan"){ echo "class= 'active'";} ?> class="link" href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>">Pesanan</a></li>
                                <?php echo "
                                </ul>
                            </li>
                            <li><a href='".BASE_URL."logout.php'>keluar</a></li>
                            ";} ?>
                        <?php if(!$user_id && !$nama){echo "
                            <li><a href='".BASE_URL."index.php?page=login'>Masuk</a></li>
                            <li><a href='".BASE_URL."index.php?page=register'>Daftar</a></li>                        
                            ";}?>
                        </ul>
                    </div>
            </div>
        </div>

        <?php if(!isset($user_id)){?>
        <div for="modal" class="modal-popup" id="modal-user">
            <div id="overlay-user" class="overlay"></div>
            <div class="container-modal-user">
                <div class="modal-close"><span id="modal-close-user">X</span></div>
                <div class="header-modal">
                    <h4>Silahkan Masuk atau Daftar</h4>
                </div>
                <div class="body-modal">
                    <div class="button-user"><a id="button-login" href="<?php echo BASE_URL . "index.php?page=login"; ?>">Masuk</a></div>
                    <div class="button-user"><a id="button-register" href="<?php echo BASE_URL . "index.php?page=register"; ?>">Daftar</a></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div for="modal" class="modal-popup" id="modal-intro">
            <div id="overlay-user" class="overlay"></div>
            <div class="container-modal-user">
                <div class="modal-close"><span id="modal-close-user">X</span></div>
                <div class="header-modal">
                    <h4>Silahkan Login atau Register</h4>
                </div>
                <div class="body-modal">
                   <h4>Selamat datang kembalik</h4>
                   <span><p>Selamat datang kembali <?php echo $nama; ?></p></span>
                </div>
            </div>
        </div>

        <div id="container">

            <div class="content">
                <?php 
                    $filename = "$page.php";
                    if(file_exists($filename))
                    {
                        include_once($filename);
                    }
                    else
                    {
                        include_once("main.php");
                        //echo "Maaf, file tersebut tidak ada di dalam system";
                    }
                ?>
            </div>
            
        </div>

        <!-------------------------------------- Footer --------------------------------------------->

        <footer id="footer" class="footer <?php $module = isset($_GET['module']) ? $_GET['module'] : false ;
                                if($module){echo "module";} ?>">
            <div class="container-footer">
                <div class="row">
                    <div class="footer-col">
                        <h4>Tim kami</h4>
                        <ul>
                            <li><a href="#">Davin Aleandra Wibawa</a></li>
                            <li><a href="#">Muhammad Awla Ridhani</a></li>
                            <li><a href="#">Muhammad Rushelasli</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <p> Didukung SMK Telkom BanjarBaru</p>
                        <b><p>© Exceed 2023</p></b>
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?php echo BASE_URL."js/modalUser.js" ?>"></script>
        <script src="js/modalUser.js"></script>
    </body>
</html>