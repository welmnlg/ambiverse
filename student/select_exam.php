<?php
    session_start();
    if( !isset($_SESSION["username"])){
        ?>
        <script type="text/javascript">
            window.location = "login/login.php";
        </script>
        <?php
    }
?>

<?php 
    include("header.php");
    include("includes/functions.php");
    
?>
    <!-- CONTENT AREA --->
        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
                <?php
                    $res = mysqli_query($conn, "SELECT * FROM exam_category");
                    while($row = mysqli_fetch_array($res)){
                        ?>
                        <input type="button" class="btn btn-success" value="<?= $row['judul_to']; ?>" style="margin-top: 10px" onclick="set_exam_type_session(this.value);">
                        <?php
                    }
                ?>
            </div>
                
        </div>

<script type="text/javascript">
    function set_exam_type_session(judul_to){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?judul_to="+ judul_to,true);
        xmlhttp.send(null);
    }
</script>

<?php include("footer.php");