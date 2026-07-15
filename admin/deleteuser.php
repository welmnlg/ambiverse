<?php
    include("../includes/functions.php");
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
?>
<script type="text/javascript">
    window.location = "daftarstudent.php";
</script>