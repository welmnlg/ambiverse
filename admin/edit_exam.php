<?php 
    include("header.php");
    include("../includes/functions.php");

    $id = $_GET['id'];
    $res = mysqli_query($conn, "SELECT * FROM exam_category WHERE id = $id");
    while($row = mysqli_fetch_array($res)){
        $kategori = $row['kategori'];
        $subtes = $row['subtes'];
        $judul_to = $row['judul_to'];
        $duration = $row['duration'];
    }
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

    <link rel="stylesheet" href="    https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
                                <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Paket Soal <i><?=$judul_to;?></i></h1>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                           <form action="" method="post">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Edit Paket Soal </strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="kategori" class=" form-control-label">Kategori TO</label>
                                                <input required type="text" name="kategori" id="kategori" placeholder="tps/saintek/soshum" class="form-control" value="<?= $kategori ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="subtes" class=" form-control-label">Subtes</label>
                                                <input required type="text" name="subtes" id="subtes" placeholder="(pu/ppu/pbm/pk) (kim/bio/fis/mat) (eko/geo/sej/sosio)" class="form-control" value="<?= $subtes ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="judul" class=" form-control-label">Judul TO</label>
                                                <input required type="text" name="judul_to" id="judul" placeholder="Judul TO" class="form-control" value="<?= $judul_to ?>">
                                            </div>    
                                            <div class="form-group">
                                                <label for="duration" class=" form-control-label">Exam Time in Minutes</label>
                                                <input required type="text" name="duration" id="duration" placeholder="Duration" class="form-control" value="<?= $duration ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="edittes" value="Edit Tes" class="btn btn-success">
                                                <a href="index.php" class="btn btn-primary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            </form> 
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->
    <?php
        if( isset($_POST['edittes'])){
            mysqli_query($conn, "UPDATE exam_category SET kategori  ='$_POST[kategori]', 
                                                          subtes    ='$_POST[subtes]', 
                                                          judul_to  ='$_POST[judul_to]',
                                                          duration  ='$_POST[duration]', 
                                                          date_added = current_timestamp()
                                                          WHERE id = $id");
            ?>
                <script type="text/javascript">
                    alert("Paket Soal Berhasil Ditambahkan!");
                    window.location = "index.php";
                </script>
            <?php
        }
    ?>
                    
                                                
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
        
