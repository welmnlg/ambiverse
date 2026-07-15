<?php //ini halaman untuk admin nambah soal (khusus tps) -> masuk ke tambahsoal_tps.php
	session_start();

	require ('../includes/functions.php');
    if( $_SESSION["username"] != "admin"){
        header("Location: ../student/index.php");
		exit;
    }
	if( !isset($_SESSION["login"]) ){
		header("Location: ../login/login.php");
		exit;
	}
    
	//copy line 9-12 ke halaman yang dilarang akses sebelum user login
    //line 5-8 untuk memisahkan login admin dan login student
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
                            
                            <div class="card shadow col-lg-12 p-3">
                                <!-- Card Body -->
                                <h4>Paket Soal TPS</h4>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingpu">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsepu" aria-expanded="true" aria-controls="collapsepu">
                                            Penalaran Umum (PU)
                                        </button>
                                        </h2>
                                        <div id="collapsepu" class="accordion-collapse collapse show" aria-labelledby="headingpu" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Tes</th>
                                                        <th>Select</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $no = 0;
                                                    $result = mysqli_query($conn, "SELECT * FROM exam_category WHERE subtes = 'pu'");
                                                    while ($row = mysqli_fetch_array($result)){
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= $row["judul_to"]; ?></td>
                                                            <td>
                                                                <a href="add_edit_questions.php?id=<?= $row['id']; ?>" class="btn btn-warning">Select</a>
                                                            </td>
                                                        </tr>
                                                        <?php
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
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Tes</th>
                                                        <th>Select</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $no = 0;
                                                    $result = mysqli_query($conn, "SELECT * FROM exam_category WHERE subtes = 'ppu'");
                                                    while ($row = mysqli_fetch_array($result)){
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= $row["judul_to"]; ?></td>
                                                            <td>
                                                                <a href="add_edit_questions.php?id=<?= $row['id']; ?>" class="btn btn-warning">Select</a>
                                                            </td>
                                                        </tr>
                                                        <?php
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
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Tes</th>
                                                        <th>Select</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $no = 0;
                                                    $result = mysqli_query($conn, "SELECT * FROM exam_category WHERE subtes = 'pbm'");
                                                    while ($row = mysqli_fetch_array($result)){
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= $row["judul_to"]; ?></td>
                                                            <td>
                                                                <a href="add_edit_questions.php?id=<?= $row['id']; ?>" class="btn btn-warning">Select</a>
                                                            </td>
                                                        </tr>
                                                        <?php
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
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Tes</th>
                                                        <th>Select</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $no = 0;
                                                    $result = mysqli_query($conn, "SELECT * FROM exam_category WHERE subtes = 'pk'");
                                                    while ($row = mysqli_fetch_array($result)){
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= $row["judul_to"]; ?></td>
                                                            <td>
                                                                <a href="add_edit_questions.php?id=<?= $row['id']; ?>" class="btn btn-warning">Select</a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                                </tbody>                 
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                
                                            
                              
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            <!-- End of Main Content -->
    
    <!-- FOOTER-->
    <?php include("footer.php"); ?>

</body>
</html>