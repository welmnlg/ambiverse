<?php
    include("../includes/functions.php");
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM kritikdansaran WHERE id = $id");
?>
<script type="text/javascript">
    window.location = "kritiksaran.php";
</script>