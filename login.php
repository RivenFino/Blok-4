<?php
    if($user_id)
    {
        header("location: ".BASE_URL);
    }

?>

<head>
    <link rel="stylesheet" href="css/login.css" type="text/css">
</head>
<div id="container-user-akses">
    <center><h1>Masuk</h1></center>

    <form action="<?php echo BASE_URL."proses_login.php"; ?>" method="post" autocomplete="off">

        <?php 
            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

            if($notif == "true")
            {
                echo "<div class='notif merah'>Email dan Sandi yang anda inputkan tidak cocok</div>";
            }
            else if($notif == "email")
            {
                echo "<div class='notif merah'>Masukkan Email anda terlebih dahulu !</div>";
            }
            else if ($notif == "password")
            {
                echo "<div class='notif merah'>Mohon masukkan Sandi anda ! </div>";
            }
        ?>

        <div class="element-form">
            <label>Email</label>
            <span><input type="text" name="email"></span>
        </div>
        
        <div class="element-form">
            <label>Sandi</label>
            <span>
                <input type="Password" name="password" id="password">
            </span>
        </div>
        
        <div class="element-form">
            <span><input type="submit" name="login" value="MASUK"></span>
        </div>
        
        <div class="text">
            <p>Belum memiliki akun? <a href="<?php echo BASE_URL."index.php?page=register" ?>">Daftar</a></p>
        </div>
    </form>

</div>