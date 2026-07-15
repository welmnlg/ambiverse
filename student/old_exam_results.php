<?php 
    session_start();
    include("header.php"); 
    include("../includes/functions.php");
    
    if( !isset($_SESSION["login"]) ){
		header("Location: ../login/login.php");
		exit;
	}
?>
<!-- CONTENT AREA --->
        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="card shadow col-lg-12 col-lg-push-3 m-1" style="min-height: 500px; background-color: white;">
            <h3>Riwayat pengerjaan paket soal <i style="color: #1f1340"><?= $_SESSION["username"] ?></i></h3>
                <?php
                    $res = mysqli_query($conn, "SELECT * FROM exam_results WHERE username = '$_SESSION[username]' ORDER BY id DESC");
                
                    $count = mysqli_num_rows($res);
                    $no = 0;
                    if($count == 0){
                        ?>
                            <center>
                                <h2 class="col-lg-8 text-danger">Kamu belum mengerjakan paket soal kami. Silahkan kembali ke halaman utama dan pilih paket soal!!</h2>
                                <a href="index.php" class="btn btn-outline-primary"><i class="fa fa-home"></i></a>
                            </center>
                        <?php
                    } else {
                        echo "<table class='table table-bordered'>";
                            echo "<tr style='background-color: #1f1340; color: white'>";
                                echo "<th>"; echo "No"; echo "</th>";
                                echo "<th>"; echo "Judul TO"; echo "</th>";
                                echo "<th>"; echo "Tanggal Tes"; echo "</th>";
                                echo "<th>"; echo "Aksi"; echo "</th>";
                            echo "</tr>";

                            while ($row = mysqli_fetch_array($res)){
                                $res1 = mysqli_query($conn, "SELECT * FROM exam_category");
                                while ($row1 = mysqli_fetch_array($res1)){
                                    if($row["judul_to"] == $row1["judul_to"]){
                                        $id = $row1["id"];
                                    }
                                }
                                
                                $no++;
                                echo "<tr>";
                                    echo "<td>"; echo $no; echo "</td>";
                                    echo "<td>"; echo $row["judul_to"]; echo "</td>";
                                    echo "<td>"; echo $row["exam_time"]; echo "</td>";
                                    echo "<td>"; ?><a href="dashboard1.php?id=<?=$id;?>" class="btn btn-primary">Kerjakan lagi!</a><?php echo "</td>";
                                echo "</tr>";
                            }
                        echo "</table>";
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