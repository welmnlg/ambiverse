<?php
	session_start();

	include ('../includes/functions.php');

	if( !isset($_SESSION["login"]) ){
		header("Location: ../login/login.php");
		exit;
	}
    
	//copy line 2-9 ke halaman yang dilarang akses sebelum user login
?>

<?php include ("header.php"); ?>
                
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Content Row -->
                    <marquee behavior="scroll" scrollamount="20" direction="left"><h3>Selamat Datang di Dashboard AmbiVerse, <i style="color: #1f1340"><?php echo $_SESSION['username'] ;?></i>!</h3></marquee>
                    <div class="row">
                        <div class="card shadow">
                            <!-- Card Body -->
                            <h5 class="mt-3 ml-4">Paket soal terbaru: </h5>
                            <div class="card-body">
                                <div>
                                            <form action="dashboard.php?id=<?= $row['id']; ?>" method="post">
                                                <table class="table table-bordered table-responsive">
                                                    <tr>
                                                        <th>Judul TO</th>
                                                        <th>Kategori (Subtes)</th>
                                                        <th>Durasi Waktu</th>
                                                        <th>Tanggal Ditambahkan</th>
                                                        <th>Aksi</th>
                                                        <th>Leaderboard</th>
                                                    </tr>
                                                    <?php 
                                                    
                                                    $res=mysqli_query($conn, "SELECT * FROM exam_category ORDER BY id DESC LIMIT 5");
                                                    while($row = mysqli_fetch_array($res)){
                                                        $id = $row['id'];

                                                        $res1 = mysqli_query($conn, "SELECT * FROM exam_results");
                                                        while ($row1 = mysqli_fetch_array($res1)){
                                                            if($row["judul_to"] == $row1["judul_to"]){
                                                                $_SESSION["judul_to"] = $row1["judul_to"];
                                                                $judul_to = $_SESSION["judul_to"];
                                                            }
                                                        }
                                                        ?>
                                                    <tr>
                                                        
                                                        <td><?= $row["judul_to"]; ?></td>
                                                        <td><?= $row["kategori"]." (".$row["subtes"].")"; ?></td>
                                                        <td><?= $row["duration"]; ?></td>
                                                        <td><?= $row["date_added"]; ?></td>
                                                        <td><a href="dashboard1.php?id=<?=$id;?>" class="btn btn-primary">Mulai TO</a></td>
                                                        <td><a href="leaderboard.php?judul_to=<?=$judul_to;?>" class="btn btn-success">Leaderboard</a></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </table>

                                                    
                                                
                                            </form>
                                            
                                </div>
                            </div>

                        </div>  
                    </div>

                </div>
                                             
            </div>
        
            <!-- End of Main Content -->
        
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

    <!-- footer -->
    <?php include("footer.php"); ?>

</body>

</html>