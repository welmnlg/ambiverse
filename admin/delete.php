
<?php
    include("../includes/functions.php");
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM exam_category WHERE id = $id");
?>
<script type="text/javascript">
    window.location = "index.php";
</script>