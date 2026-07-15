<?php
    session_start();
    include ("../includes/functions.php");

    $judul_to = $_GET["judul_to"];
    $_SESSION["judul_to"] = $judul_to;

    $res=mysqli_query($conn, "SELECT * FROM exam_category WHERE judul_to='$judul_to'");
    while($row = mysqli_fetch_array($res)) {
        $_SESSION["exam_time"] = $row["duration"];
    }

    $_SESSION["exam_time"] = (int)$_SESSION["exam_time"];
    $exam_time = $_SESSION["exam_time"];

    date_default_timezone_set('Asia/Jakarta');
    $date = date("Y-m-d H:i:s");

    $_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+$exam_time minutes"));
    $_SESSION["exam_start"] = "yes";
?>
<script>
    window.location="../student/dashboard.php?judul_to=<?=$judul_to;?>";
</script>