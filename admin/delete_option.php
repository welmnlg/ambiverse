<?php
    include("../includes/functions.php");
    $id = $_GET['id'];
    $id1 = $_GET['id1'];

    mysqli_query($conn, "DELETE FROM questions WHERE id = $id");

?>

<script type="text/javascript">
    window.location = "add_edit_questions.php?id=<?= $id1; ?>";
</script>