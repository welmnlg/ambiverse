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
                    <h2>Paket Soal TPS</h2>
                    <!-- Content Row -->
                    
                    <div class="row">
                        <div class="card shadow">
                            <!-- Card Body -->
                            <div class="card-body p-3 mb-3">
                                
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingsatu">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesatu" aria-expanded="true" aria-controls="collapsesatu">
                                            Penalaran Umum (PU)
                                        </button>
                                        </h2>
                                        <div id="collapsesatu" class="accordion-collapse collapse show" aria-labelledby="headingsatu" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <form action="dashboard.php?id=<?= $row['id']; ?>" method="post">

                                            <table class="table table-bordered table-responsive">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul TO</th>
                                                    <th>Kategori (Subtes)</th>
                                                    <th>Durasi Waktu</th>
                                                    <th>Tanggal Ditambahkan</th>
                                                    <th>Aksi</th>
                                                    <th>Leaderboard</th>
                                                </tr>
                                                <?php 
                                                $i = 0;
                                                $res=mysqli_query($conn, "SELECT * FROM exam_category WHERE subtes = 'pu' ORDER BY id DESC");
                                                while($row = mysqli_fetch_array($res)){
                                                    $id = $row['id'];
                                                    $i++;
                                                    $res1 = mysqli_query($conn, "SELECT * FROM exam_results");
                                                    while ($row1 = mysqli_fetch_array($res1)){
                                                        if($row["judul_to"] == $row1["judul_to"]){
                                                            $_SESSION["judul_to"] = $row1["judul_to"];
                                                            $judul_to = $_SESSION["judul_to"];
                                                        }
                                                    }
                                                    ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
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
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingdua">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsedua" aria-expanded="false" aria-controls="collapsedua">
                                            Pengetahuan dan Pemahaman Umum (PPU)
                                        </button>
                                        </h2>
                                        <div id="collapsedua" class="accordion-collapse collapse" aria-labelledby="headingdua" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <form action="dashboard.php?id=<?= $row['id']; ?>" method="post">
                                                <table class="table table-bordered table-responsive">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul TO</th>
                                                        <th>Kategori (Subtes)</th>
                                                        <th>Durasi Waktu</th>
                                                        <th>Tanggal Ditambahkan</th>
                                                        <th>Aksi</th>
                                                        <th>Leaderboard</th>
                                                    </tr>
                                                    <?php 
                                                    $i = 0;
                                                    $res=mysqli_query($conn, "SELECT * FROM exam_category WHERE subtes = 'ppu' ORDER BY id DESC");
                                                    while($row = mysqli_fetch_array($res)){
                                                        $id = $row['id'];
                                                        $i++;
                                                        $res1 = mysqli_query($conn, "SELECT * FROM exam_results");
                                                        while ($row1 = mysqli_fetch_array($res1)){
                                                            if($row["judul_to"] == $row1["judul_to"]){
                                                                $_SESSION["judul_to"] = $row1["judul_to"];
                                                                $judul_to = $_SESSION["judul_to"];
                                                            }
                                                        }
                                                        ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
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
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingtiga">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetiga" aria-expanded="false" aria-controls="collapsetiga">
                                            Pemahaman Bacaan dan Menulis (PBM)
                                        </button>
                                        </h2>
                                        <div id="collapsetiga" class="accordion-collapse collapse" aria-labelledby="headingtiga" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <form action="dashboard.php?id=<?= $row['id']; ?>" method="post">
                                                <table class="table table-bordered table-responsive">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul TO</th>
                                                        <th>Kategori (Subtes)</th>
                                                        <th>Durasi Waktu</th>
                                                        <th>Tanggal Ditambahkan</th>
                                                        <th>Aksi</th>
                                                        <th>Leaderboard</th>
                                                    </tr>
                                                    <?php 
                                                    $i = 0;
                                                    $res=mysqli_query($conn, "SELECT * FROM exam_category WHERE subtes = 'pbm' ORDER BY id DESC");
                                                    while($row = mysqli_fetch_array($res)){
                                                        $id = $row['id'];
                                                        $i++;
                                                        $res1 = mysqli_query($conn, "SELECT * FROM exam_results");
                                                        while ($row1 = mysqli_fetch_array($res1)){
                                                            if($row["judul_to"] == $row1["judul_to"]){
                                                                $_SESSION["judul_to"] = $row1["judul_to"];
                                                                $judul_to = $_SESSION["judul_to"];
                                                            }
                                                        }
                                                        ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
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
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingempat">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseempat" aria-expanded="false" aria-controls="collapseempat">
                                            Pengetahuan Kuantitatif (PK)
                                        </button>
                                        </h2>
                                        <div id="collapseempat" class="accordion-collapse collapse" aria-labelledby="headingempat" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <form action="dashboard.php?id=<?= $row['id']; ?>" method="post">
                                                <table class="table table-bordered table-responsive">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul TO</th>
                                                        <th>Kategori (Subtes)</th>
                                                        <th>Durasi Waktu</th>
                                                        <th>Tanggal Ditambahkan</th>
                                                        <th>Aksi</th>
                                                        <th>Leaderboard</th>
                                                    </tr>
                                                    <?php 
                                                    $i = 0;
                                                    $res=mysqli_query($conn, "SELECT * FROM exam_category WHERE subtes = 'pk' ORDER BY id DESC");
                                                    while($row = mysqli_fetch_array($res)){
                                                        $id = $row['id'];
                                                        $i++;
                                                        $res1 = mysqli_query($conn, "SELECT * FROM exam_results");
                                                        while ($row1 = mysqli_fetch_array($res1)){
                                                            if($row["judul_to"] == $row1["judul_to"]){
                                                                $_SESSION["judul_to"] = $row1["judul_to"];
                                                                $judul_to = $_SESSION["judul_to"];
                                                            }
                                                        }
                                                        ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
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