<?php
    //untuk menjamin sessionnya hilang
    session_start();
    $_SESSION[''];
    session_unset();
    session_destroy();
    //--------------------------------

    //arahkan ke halaman login lagi setelah berhasil logout
    header("Location: login.php");
    exit;
?>