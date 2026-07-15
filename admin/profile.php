<?php
    session_start();
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
                            <div class="col-lg-4"></div>
                            <div class="card shadow col-lg-4 p-5">
                                <!-- Card Body -->
                                <h3 class="text-center">Profil Admin</h3>
                                <table>
                                    <tr>
                                        <td><br></td>
                                        <td><br></td>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td width=30> : </td>
                                        <td><?= $_SESSION["username"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td width=30> : </td>
                                        <td><?= $_SESSION["email"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                        <td><br></td>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td colspan=3 class="text-center">
                                            <a href="index.php" class="btn btn-outline-warning"><i class="fa fa-home"></i></a>
                                        </td>
                                    </tr>
                                </table>
                                
                            </div>
                            <div class="col-lg-4"></div>
                        </div>
                    </div>
                </div>
                
            <!-- End of Main Content -->
           
    <!-- FOOTER-->
    <?php include("footer.php"); ?>
    
</body>
</html>


