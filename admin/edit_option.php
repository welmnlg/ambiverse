<?php 
    include("../includes/functions.php");

    $id = $_GET['id'];
    $id1 = $_GET['id1'];

    $question = "";
    $opt1 = "";
    $opt2 = "";
    $opt3 = "";
    $opt4 = "";
    $answer = "";
    $judul_to = "";
    $subtes = "";
    $res = mysqli_query ($conn, "SELECT * FROM questions WHERE id = $id");
    while ($row = mysqli_fetch_array($res)){
        $question = $row["question"];
        $opt1     = $row["opt1"];
        $opt2     = $row["opt2"];
        $opt3     = $row["opt3"];
        $opt4     = $row["opt4"];
        $answer   = $row["answer"];
        $judul_to = $row["judul_to"];
        $subtes   = $row["subtes"];
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
    <script src="/.js"></script>
    <link rel="stylesheet" href="    https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"></script>
    

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
                        <h1>Edit Soal Tes <i style="color: #1f1340"><?= $judul_to ?></i></h1>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div class="col-lg-12">
                                    <form action="" method="POST">
                                    <div class="card">
                                        <div class="card-header"><strong>Edit Soal</strong></div>
                                        <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="question" class="form-control-label">Tambah Soal</label><br>
                                            <textarea class="ckeditor" name="question" id=""><?php echo $question; ?></textarea><br>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="opt1" class="form-control-label">Tambah Pilihan Jawaban 1</label><br>
                                            <textarea class="ckeditor" name="opt1" id="" ><?php echo $opt1; ?></textarea><br>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="opt2" class="form-control-label">Tambah Pilihan Jawaban 2</label>
                                            <br>
                                            <textarea class="ckeditor" name="opt2" id=""><?php echo $opt2; ?></textarea><br>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="opt3" class="form-control-label">Tambah Pilihan Jawaban 3</label>
                                            <br>
                                            <textarea class="ckeditor" name="opt3" id=""><?php echo $opt3; ?></textarea><br>
                                        </div>
                                    
                                    
                                        <div class="form-group">
                                            <label for="opt4" class="form-control-label">Tambah Pilihan Jawaban 4</label>
                                            <br>
                                            <textarea class="ckeditor" name="opt4" id=""><?php echo $opt4; ?></textarea><br>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="answer" class="form-control-label">Tambah Jawaban </label>
                                            <br>
                                            <textarea class="ckeditor" name="answer" id=""><?php echo $answer; ?></textarea><br>
                                        </div>

                                            <div class="form-group">
                                                <label for="judul_to" class="form-control-label" required>Judul TO</label>
                                                <input disabled type="text" name="judul_to" id="judul_to" placeholder="Judul TO" class="form-control" value="<?= $judul_to ?>">
                                            </div>    
                                            <div class="form-group">
                                                <label for="subtes" class="form-control-label" required>Subtes</label>
                                                <input disabled type="text" name="subtes" id="subtes" placeholder="(pu/ppu/pbm/pk) (kim/bio/fis/mat) (eko/geo/sej/sosio)" class="form-control" value="<?= $subtes ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="editsoal" value="Edit Soal" class="btn btn-success">
                                                <a href="add_edit_questions.php?id=<?= $id1; ?>" class="btn btn-primary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->
                         
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    <?php
        if( isset($_POST["editsoal"]) ){
            mysqli_query($conn, "UPDATE questions SET question='$_POST[question]', opt1='$_POST[opt1]', opt2='$_POST[opt2]', opt3='$_POST[opt3]', opt4='$_POST[opt4]', answer='$_POST[answer]' WHERE id=$id");
           ?>
            <script type="text/javascript">
                window.location = "add_edit_questions.php?id=<?= $id1; ?>";
            </script>
           <?php
        }

    ?>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            <!-- End of Main Content -->
    
    <!-- FOOTER-->
    <?php include("footer.php"); ?>

</body>
</html>



        
    