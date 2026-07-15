<?php 
    session_start();
    include("header.php"); 
?>
<!-- CONTENT AREA --->
        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
            <div class="col-lg-4"></div>
            <div class="card shadow col-lg-4 p-5">
                <!-- Card Body -->
                <h3 class="text-center">Profil User</h3>
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
<?php include("footer.php");