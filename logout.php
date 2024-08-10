<?php

    session_start();


    unset($_SESSION['user_id']);
    unset($_SESSION['nama']);
    unset($_SESSION['level']);
    unset($user_id);
    unset($email);
    unset($status);

    session_destroy();
    header("location: index.php");
?>