<?php 
    include("header.php");
    include("../includes/functions.php");

    $id = $_GET["id"];
    $judul_to = '';
    $res = mysqli_query($conn, "SELECT * FROM exam_category WHERE id = $id");
    while($row = mysqli_fetch_array($res)){
        $judul_to = $row['judul_to'];
        $subtes = $row['subtes'];
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
                        <h1>Tambah soal ke dalam <i style="color: #1f1340"><?= $judul_to ?></i></h1>
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
                                        <div class="card-header"><strong>Tambah Soal Tes</strong></div>
                                        <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="question" class="form-control-label">Tambah Soal</label><br>
                                            <textarea required class="ckeditor" name="question" id="question"></textarea><br>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="opt1" class="form-control-label">Tambah Pilihan Jawaban 1</label><br>
                                            <textarea required class="ckeditor" name="opt1" id="opt1"></textarea><br>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="opt2" class="form-control-label">Tambah Pilihan Jawaban 2</label><br>
                                            <textarea required class="ckeditor" name="opt2" id="opt2"></textarea><br>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="opt3" class="form-control-label">Tambah Pilihan Jawaban 3</label><br>
                                            <textarea required class="ckeditor" name="opt3" id="opt3"></textarea><br>
                                        </div>
                                    
                                    
                                        <div class="form-group">
                                            <label for="opt4" class="form-control-label">Tambah Pilihan Jawaban 4</label><br>
                                            <textarea required class="ckeditor" name="opt4" id="opt4"></textarea><br>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="answer" class="form-control-label">Tambah Jawaban </label><br>
                                            <textarea required class="ckeditor" name="answer" id="answer"></textarea><br>
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
                                                <input type="submit" name="tambahsoal" value="Tambah Soal" class="btn btn-success">
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Question</th>
                                        <th>Opt1</th>
                                        <th>Opt2</th>
                                        <th>Opt3</th>
                                        <th>Opt4</th>
                                        <th>Answer</th>
                                        <th colspan=2>Aksi</th>
                                    </tr>
                                    <?php
                                    $res = mysqli_query($conn, "SELECT * FROM questions WHERE judul_to = '$judul_to' ORDER BY question_no ASC");
                                    while ($row = mysqli_fetch_array($res)){
                                        echo "<tr>"; 
                                            echo "<td>"; echo $row['question_no']; echo "</td>";
                                            echo "<td>"; echo $row['question']; echo "</td>";
                                            echo "<td>"; echo $row['opt1']; echo "</td>";
                                            echo "<td>"; echo $row['opt2']; echo "</td>";
                                            echo "<td>"; echo $row['opt3']; echo "</td>";
                                            echo "<td>"; echo $row['opt4']; echo "</td>";
                                            echo "<td>"; echo $row['answer']; echo "</td>";
                                            ?>
                                            <td><a class="btn btn-warning" href="edit_option.php?id=<?= $row['id']; ?>&id1=<?= $id; ?>">Edit</a></td>
                                            <td><a class="btn btn-danger" href="delete_option.php?id=<?= $row['id']; ?>&id1=<?= $id;?>">Hapus</a></td>

                                            <?php
                                        echo "</tr>";
                                    }
                                ?>
                                </table>
                                
                            </div>                      
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<?php
    if(isset($_POST['tambahsoal'])){
        $loop = 0;
        $count = 0;

        $res = mysqli_query($conn, "SELECT * FROM questions WHERE judul_to = '$judul_to' ORDER BY id ASC") or die(mysqli_error($conn));
        $count = mysqli_num_rows($res);

        if($count == 0){

        } else {
            while ($row = mysqli_fetch_array($res)){
                $loop = $loop + 1;
                mysqli_query($conn, "UPDATE questions SET question_no='$loop' WHERE id = $row[id]");
            }
        }
        $loop = $loop + 1;
        mysqli_query($conn, "INSERT INTO questions VALUES (NULL, '$loop', '$_POST[question]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$judul_to', '$subtes')") or die(mysqli_error($conn));
        ?>
            <script type="text/javascript">
                alert("Soal Berhasil Ditambahkan!");
                window.location.href=window.location.href;
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


    