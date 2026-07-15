<?php
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
                                <h3 class="mt-3">Daftar Pengguna</h3>
                                <!-- Card Body -->
                                <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Username</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Delete User</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $count = 0;
                                                        $res = mysqli_query($conn, "SELECT * FROM user WHERE username != 'admin'");
                                                        while($row = mysqli_fetch_array($res)){
                                                            $count = $count + 1;
                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?= $count; ?></th>
                                                                <td><?= $row['username']; ?></td>
                                                                <td><?= $row['email']; ?></td>
                                                                <td><a href="deleteuser.php?id=<?=$row['id'];?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
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
                
            <!-- End of Main Content -->
    
    <!-- FOOTER-->
    <?php include("footer.php"); ?>

</body>
</html>
























