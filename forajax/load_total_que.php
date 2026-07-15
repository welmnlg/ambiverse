<?php
    session_start();
    include("../includes/functions.php");

    $total_que = 0;

    $res1 = mysqli_query($conn, "SELECT * FROM questions WHERE judul_to = '$_SESSION[judul_to]'");
    $total_que = mysqli_num_rows($res1);

    echo $total_que;
?>