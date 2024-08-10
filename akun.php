<?php 
    include "function/koneksi.php";
    include "function/helper.php";

    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : false;
    $page = isset($_GET['page']) ? $_GET['page'] : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Exceed</title>
</head>
<body>
    <div class="navigasi">
        <a href="<?php echo BASE_URL."index.php?notif=akunTerubah"; ?>">Home</a>
    </div>
    <div class="container">
        <div class="header"><h1>Perubahan Akun</h1></div>
        <div class="body">
            <div class="side-nav">
                <ul>
                    <li><a href="<?php echo BASE_URL."akun.php?page=profile"; ?>">Profile</a></li>
                    <li><a href="<?php echo BASE_URL."akun.php?page=keamanan"; ?>">Keamanan</a></li>
                </ul>
            </div>
            <div class="content">
            <?php 
                    $filename = "akun/$page.php";
                    if(file_exists($filename))
                    {
                        include_once($filename);
                    }
                    else
                    {
                        include_once("akun/profile.php");
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>