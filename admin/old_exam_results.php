<?php 
    session_start();
    include("../includes/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard - AmbiVerse</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar.php" ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
                <div id="content">
                    <?php include "topbar.php" ?>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Content Row -->
                        <div class="row">

                            <div class="card shadow col-lg-12">
                                <!-- Card Body -->

                                    <div class="content mt-3 mb-3">
                                        <div class="animated fadeIn">


                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        
                                                        <div class="card-body">
                                                            <!-- Credit Card -->
                                                            <h1 class="text-center">Hasil Tryout Pengguna</h1> 
                                                            <?php
                                                                $res = mysqli_query($conn, "SELECT * FROM exam_results ORDER BY judul_to");
                                                                $count = mysqli_num_rows($res);
                                                                $i = 0;
                                                                
                                                                if($count == 0){
                                                                    ?>
                                                                        <center>
                                                                            <h3 class="mt-5">Belum ada :(</h3>
                                                                        </center>
                                                                    <?php
                                                                } else {?>
                                                            <h4>TPS</h4>
                                                            <div class="accordion" id="accordionExample">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="tps_pu">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsepu" aria-expanded="true" aria-controls="collapsepu">
                                                                        Penalaran Umum (PU)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsepu" class="accordion-collapse collapse show" aria-labelledby="headingpu" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <table id="tabel-data" class="table table-bordered table-responsive">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Username</th>
                                                                                    <th>Judul TO</th>
                                                                                    <th>Total Soal</th>
                                                                                    <th>Nilai</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                
                                                                                $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'pu'");
                                                                                
                                                                                while($row = mysqli_fetch_array($res))
                                                                                {
                                                                                    $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                    echo "<tr>
                                                                                    <td>".$row['username']."</td>
                                                                                    <td>".$row['judul_to']."</td>
                                                                                    <td>".$row['total_question']."</td>
                                                                                    <td>".$nilai."</td>
                                                                                </tr>";
                                                                                }
                                                                            ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingppu">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseppu" aria-expanded="false" aria-controls="collapseppu">
                                                                        Pengetahuan dan Pemahaman Umum (PPU)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapseppu" class="accordion-collapse collapse" aria-labelledby="headingppu" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                    <table id="tabel-data" class="table table-bordered table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Username</th>
                                                                                <th>Judul TO</th>
                                                                                <th>Total Soal</th>
                                                                                <th>Nilai</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            
                                                                            $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'ppu'");
                                                                            
                                                                            while($row = mysqli_fetch_array($res))
                                                                            {
                                                                                $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                echo "<tr>
                                                                                <td>".$row['username']."</td>
                                                                                <td>".$row['judul_to']."</td>
                                                                                <td>".$row['total_question']."</td>
                                                                                <td>".$nilai."</td>
                                                                            </tr>";
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingpbm">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsepbm" aria-expanded="false" aria-controls="collapsepbm">
                                                                        Pemahaman Bacaan dan Menulis (PBM)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsepbm" class="accordion-collapse collapse" aria-labelledby="headingpbm" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                    <table id="tabel-data" class="table table-bordered table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Username</th>
                                                                                <th>Judul TO</th>
                                                                                <th>Total Soal</th>
                                                                                <th>Nilai</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            
                                                                            $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'pbm'");
                                                                            
                                                                            while($row = mysqli_fetch_array($res))
                                                                            {
                                                                                $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                echo "<tr>
                                                                                <td>".$row['username']."</td>
                                                                                <td>".$row['judul_to']."</td>
                                                                                <td>".$row['total_question']."</td>
                                                                                <td>".$nilai."</td>
                                                                            </tr>";
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingpk">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsepk" aria-expanded="false" aria-controls="collapsepk">
                                                                        Pengetahuan Kuantitatif (PK)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsepk" class="accordion-collapse collapse" aria-labelledby="headingpk" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                    <table id="tabel-data" class="table table-bordered table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Username</th>
                                                                                <th>Judul TO</th>
                                                                                <th>Total Soal</th>
                                                                                <th>Nilai</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            
                                                                            $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'pk'");
                                                                            
                                                                            while($row = mysqli_fetch_array($res))
                                                                            {
                                                                                $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                echo "<tr>
                                                                                <td>".$row['username']."</td>
                                                                                <td>".$row['judul_to']."</td>
                                                                                <td>".$row['total_question']."</td>
                                                                                <td>".$nilai."</td>
                                                                            </tr>";
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>

                                                            <h4>TKA (Saintek)</h4>
                                                            <div class="accordion" id="accordionExample1">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="tka_st">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsekim" aria-expanded="true" aria-controls="collapsekim">
                                                                        Kimia (kim)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsekim" class="accordion-collapse collapse show" aria-labelledby="headingkim" data-bs-parent="#accordionExample1">
                                                                    <div class="accordion-body">
                                                                        <table id="tabel-data" class="table table-bordered table-responsive">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Username</th>
                                                                                    <th>Judul TO</th>
                                                                                    <th>Total Soal</th>
                                                                                    <th>Nilai</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                
                                                                                $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'kim'");
                                                                                
                                                                                while($row = mysqli_fetch_array($res))
                                                                                {
                                                                                    $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                    echo "<tr>
                                                                                    <td>".$row['username']."</td>
                                                                                    <td>".$row['judul_to']."</td>
                                                                                    <td>".$row['total_question']."</td>
                                                                                    <td>".$nilai."</td>
                                                                                </tr>";
                                                                                }
                                                                            ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingbio">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsebio" aria-expanded="false" aria-controls="collapsebio">
                                                                        Biologi (bio)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsebio" class="accordion-collapse collapse" aria-labelledby="headingbio" data-bs-parent="#accordionExample1">
                                                                    <div class="accordion-body">
                                                                    <table id="tabel-data" class="table table-bordered table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Username</th>
                                                                                <th>Judul TO</th>
                                                                                <th>Total Soal</th>
                                                                                <th>Nilai</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            
                                                                            $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'bio'");
                                                                            
                                                                            while($row = mysqli_fetch_array($res))
                                                                            {
                                                                                $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                echo "<tr>
                                                                                <td>".$row['username']."</td>
                                                                                <td>".$row['judul_to']."</td>
                                                                                <td>".$row['total_question']."</td>
                                                                                <td>".$nilai."</td>
                                                                            </tr>";
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingfis">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefis" aria-expanded="false" aria-controls="collapsefis">
                                                                        Fisika (fis)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsefis" class="accordion-collapse collapse" aria-labelledby="headingfis" data-bs-parent="#accordionExample1">
                                                                    <div class="accordion-body">
                                                                    <table id="tabel-data" class="table table-bordered table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Username</th>
                                                                                <th>Judul TO</th>
                                                                                <th>Total Soal</th>
                                                                                <th>Nilai</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            
                                                                            $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'fis'");
                                                                            
                                                                            while($row = mysqli_fetch_array($res))
                                                                            {
                                                                                $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                echo "<tr>
                                                                                <td>".$row['username']."</td>
                                                                                <td>".$row['judul_to']."</td>
                                                                                <td>".$row['total_question']."</td>
                                                                                <td>".$nilai."</td>
                                                                            </tr>";
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingmat">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsemat" aria-expanded="false" aria-controls="collapsemat">
                                                                        Matematika (mat)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsemat" class="accordion-collapse collapse" aria-labelledby="headingmat" data-bs-parent="#accordionExample1">
                                                                    <div class="accordion-body">
                                                                    <table id="tabel-data" class="table table-bordered table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Username</th>
                                                                                <th>Judul TO</th>
                                                                                <th>Total Soal</th>
                                                                                <th>Nilai</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            
                                                                            $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'mat'");
                                                                            
                                                                            while($row = mysqli_fetch_array($res))
                                                                            {
                                                                                $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                echo "<tr>
                                                                                <td>".$row['username']."</td>
                                                                                <td>".$row['judul_to']."</td>
                                                                                <td>".$row['total_question']."</td>
                                                                                <td>".$nilai."</td>
                                                                            </tr>";
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <br>
                                                            
                                                            <h4>TKA (Soshum)</h4>
                                                            <div class="accordion" id="accordionExample2">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="tka_sh">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseeko" aria-expanded="true" aria-controls="collapseeko">
                                                                        Ekonomi (eko)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapseeko" class="accordion-collapse collapse show" aria-labelledby="headingeko" data-bs-parent="#accordionExample2">
                                                                    <div class="accordion-body">
                                                                        <table id="tabel-data" class="table table-bordered table-responsive">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Username</th>
                                                                                    <th>Judul TO</th>
                                                                                    <th>Total Soal</th>
                                                                                    <th>Nilai</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                
                                                                                $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'eko'");
                                                                                
                                                                                while($row = mysqli_fetch_array($res))
                                                                                {
                                                                                    $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                    echo "<tr>
                                                                                    <td>".$row['username']."</td>
                                                                                    <td>".$row['judul_to']."</td>
                                                                                    <td>".$row['total_question']."</td>
                                                                                    <td>".$nilai."</td>
                                                                                </tr>";
                                                                                }
                                                                            ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingsej">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesej" aria-expanded="false" aria-controls="collapsesej">
                                                                        Sejarah (sej)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsesej" class="accordion-collapse collapse" aria-labelledby="headingsej" data-bs-parent="#accordionExample2">
                                                                    <div class="accordion-body">
                                                                    <table id="tabel-data" class="table table-bordered table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Username</th>
                                                                                <th>Judul TO</th>
                                                                                <th>Total Soal</th>
                                                                                <th>Nilai</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            
                                                                            $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'sej'");
                                                                            
                                                                            while($row = mysqli_fetch_array($res))
                                                                            {
                                                                                $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                echo "<tr>
                                                                                <td>".$row['username']."</td>
                                                                                <td>".$row['judul_to']."</td>
                                                                                <td>".$row['total_question']."</td>
                                                                                <td>".$nilai."</td>
                                                                            </tr>";
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headinggeo">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsegeo" aria-expanded="false" aria-controls="collapsegeo">
                                                                        Geografi (geo)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsegeo" class="accordion-collapse collapse" aria-labelledby="headinggeo" data-bs-parent="#accordionExample2">
                                                                    <div class="accordion-body">
                                                                    <table id="tabel-data" class="table table-bordered table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Username</th>
                                                                                <th>Judul TO</th>
                                                                                <th>Total Soal</th>
                                                                                <th>Nilai</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            
                                                                            $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'geo'");
                                                                            
                                                                            while($row = mysqli_fetch_array($res))
                                                                            {
                                                                                $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                echo "<tr>
                                                                                <td>".$row['username']."</td>
                                                                                <td>".$row['judul_to']."</td>
                                                                                <td>".$row['total_question']."</td>
                                                                                <td>".$nilai."</td>
                                                                            </tr>";
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="headingsosio">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesosio" aria-expanded="false" aria-controls="collapsesosio">
                                                                        Sosiologi (sosio)
                                                                    </button>
                                                                    </h2>
                                                                    <div id="collapsesosio" class="accordion-collapse collapse" aria-labelledby="headingsosio" data-bs-parent="#accordionExample2">
                                                                    <div class="accordion-body">
                                                                    <table id="tabel-data" class="table table-bordered table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Username</th>
                                                                                <th>Judul TO</th>
                                                                                <th>Total Soal</th>
                                                                                <th>Nilai</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                            
                                                                            $res = mysqli_query($conn,"SELECT * FROM exam_results WHERE subtes = 'sosio'");
                                                                            
                                                                            while($row = mysqli_fetch_array($res))
                                                                            {
                                                                                $nilai = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                                                                echo "<tr>
                                                                                <td>".$row['username']."</td>
                                                                                <td>".$row['judul_to']."</td>
                                                                                <td>".$row['total_question']."</td>
                                                                                <td>".$nilai."</td>
                                                                            </tr>";
                                                                            }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            <?php
                                                }
                                            ?>

                                      
                                        </div> <!-- .card -->

                                    </div>
                                    <!--/.col-->

                                    
                                                                
                                </div>
                            </div><!-- .animated -->
                        </div><!-- .content -->
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            <!-- End of Main Content -->
    
    <!-- FOOTER-->
    <?php include("footer.php"); ?>
    
</body>
</html>