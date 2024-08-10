    <head>
        <link rel="stylesheet" href="css/login.css" type="text/css">
    </head>
    <div id="container-user-akses">
        <center><div class="header-akun"><h2>Daftar</h2></div></center>


        <form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST" autocomplete="off">

            <?php
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
                $email = isset($_GET['email']) ? $_GET['email'] : false;
                $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
                $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

                if($notif == "require")
                {
                    echo "<div class='notif'>Lengkapi Form dibawah ini</div>";
                }
                else if($notif == "password")
                {
                    echo "<div class='notif'>Maaf, Sandi yang kamu masukan tidak sama</div>";
                }
                else if($notif == "email")
                {
                    echo "<div class='notif'>Maaf, email yang kamu masukan sudah terdaftar</div>";
                }
                else if($notif == "sukses")
                {
                    echo "<div class='notif'>Anda berhasil register</div>";
                }
            ?>
            
            <div class="element-form">
                <label>Nama lengkap</label>
                <span><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>"></span>
            </div>

            <div class="element-form">
                <label>Email</label>
                <span><input type="text" name="email" value="<?php echo $email; ?>"></span>
            </div>

            <div class="element-form">
                <label>Handphone</label>
                <span><input type="text" name="phone" value="<?php echo $phone; ?>"></span>
            </div>

            <div class="element-form">
                <label>Alamat</label>
                <span><textarea name="alamat"><?php echo $alamat;?></textarea></span>
            </div>

            <div class="element-form">
                <label>Sandi</label>
                <span>
                    <input type="password" id="password" name="password">
                </span>
            </div>
            
            <div class="element-form">
                <label>Ulangi Sandi</label>
                <span>
                    <input type="password" id="password" name="re_password">
                </span>
            </div>
            
            <div class="element-form">
                <span><input type="submit" name="register" value="DAFTAR"></span>
            </div>

            <div class="text">
                <p>Sudah memiliki akun? <a href="<?php echo BASE_URL."index.php?page=login" ?>">Masuk</a></p>
            </div>
        </form>

    </div>