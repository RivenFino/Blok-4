<?php 
    include_once ("helper.php");

    $status = isset($_GET["status"]) ? $_GET["status"] : false;
    if($status == "login")
    {
        session_start();


        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
        $nama    = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
        $level   = isset($_SESSION['level']) ? $_SESSION['level'] : false;

        header("location: ".BASE_URL."index.php?page=main");
    }
    else
    {

        session_start();


        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
        $nama    = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
        $level   = isset($_SESSION['level']) ? $_SESSION['level'] : false;

    }
    

?>