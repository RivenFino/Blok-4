<?php 

    include_once("function/koneksi.php");
    include_once("function/helper.php");

    $email       = $_POST['email'];
    $password    = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on'");
    
    if(!$email)
    {
        header("location:". BASE_URL . "Index.php?page=login&notif=email");
    }
    else if (!  $password)
    {
        header("location:". BASE_URL . "Index.php?page=login&notif=password");
    }
    else if(mysqli_num_rows($query) == 0)
    {
        header("location:". BASE_URL . "Index.php?page=login&notif=true");
    }
    else
    {
        $row = mysqli_fetch_assoc($query);

        session_start();

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['status'] = "on";

        header("location: ".BASE_URL."function/session.php?status=login");
    }


?>