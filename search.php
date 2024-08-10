<?php
    include("function/helper.php");
    include("function/koneksi.php");
    include("function/session.php");
    $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : false;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari : <?php echo $keyword;?></title>
    <link href="image/logo/logo3.png" rel="shortcut icon">
    <link rel="stylesheet" href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo BASE_URL."css/kartu_produk.css"?>">
    <script src="<?php echo BASE_URL."js/modalUser.js" ?>"></script>
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
                
                <div class="keranjang button-user">
                    <button  style="background: rgba(0, 0, 0, 0); border: none; cursor: pointer;" <?php if(!$nama && !$user_id){echo "onclick='modalUser()' id='button-user'";}elseif($nama && $user_id){echo "";} ?> href=""><img src="<?php echo BASE_URL."image/icon/cart.png?>";?>" alt="Cart" height="20px" width="auto"></button>
                </div>
                    
                <div class="vertical-hr" id="vertical-hr"></div>
                
                <div>
                    <button  id="menuToggle" onclick="menuToggle()">Menu</button>
                </div>

            </div>
        </header>
        <!-------------------------------------- Content --------------------------------------------->
</body>
</html>