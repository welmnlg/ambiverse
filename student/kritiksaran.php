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
                    
                    <div class="row">
                        <div class="card shadow">
                            <!-- Card Body -->
                            <h4 class="mt-3 ml-4">Kritik dan Saran </h4>
                            <div class="card-body">
                                <div>
                                    <div class="card card-body col-lg-12 ">
                                        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; min-height: 300px">
                                                <form action="" method="post">
                                                    Masukkan kritik dan saranmu kepada admin AmbiVerse melalui textarea di bawah: <br><br>
                                                    <textarea class="col-lg-6" name="krisar" placeholder="Kritik dan saran di sini" style="min-width: 100%; min-height: 200px"></textarea><br><br>
                                                    <button class="btn btn-primary" type="submit" name="kritiksaran" value="Kirim">Kirim</button>
                                                </form>
                                            
                
                                        </div>
                                    </div>

                                    <?php
                                        if(isset($_POST['kritiksaran'])){

                                        mysqli_query($conn, "INSERT INTO kritikdansaran VALUES (NULL, '$_SESSION[username]', '$_SESSION[email]', '$_POST[krisar]')") or die(mysqli_error($conn));
                                        ?>
                                            <script type="text/javascript">
                                                alert("Pesanmu berhasil dikirim!");
                                                
                                            </script>
                                        <?php
                                    }   
                                    ?>
        
                                            
                                </div>
                            </div>

                        </div>  
                    </div>

                </div>
                                             
            </div>
        
            <!-- End of Main Content -->
        
        </div>
    </div>
    

    <!-- footer -->
    <?php include("footer.php"); ?>

</body>

</html>
    