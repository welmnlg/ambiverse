<?php 
    include("../includes/functions.php");
    if(isset($_GET["cari"])){
        if(cari($_GET["keyword"]) == 0){
            echo "<script>
                    alert('Tidak ada hasil yang sesuai.');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            $mahasiswa = cari($_GET["keyword"]);
        }
    }
?>

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title mt-2">
                        <h1>Tambah Paket Soal</h1>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-2">
                           <form id="paketsoal" action="" method="post">
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div class="col-lg-4 float-left">
                                    <div class="card mb-2">
                                        <div class="card-header"><strong>Tambah Paket Baru</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="kategori" class=" form-control-label" required>Kategori TO</label>
                                                <input required pattern="tps|saintek|soshum" title="kategori invalid. Isi dengan tps/saintek/soshum!" type="text" name="kategori" id="kategori" placeholder="tps/saintek/soshum" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="subtes" class=" form-control-label" required>Subtes <br>(pu/ppu/pbm/pk) (kim/bio/fis/mat) (eko/geo/sej/sosio)</label>
                                                <input maxlength="5" pattern="pu|ppu|pbm|pk|bio|kim|fis|mat|sej|eko|geo|sosio" required type="text" name="subtes" id="subtes" placeholder="Isi sesuai kode subtes" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="judul" class=" form-control-label" required>Judul TO</label>
                                                <input pattern=".{3,50}" required title="3 sampai 50 karakter" type="text" name="judul_to" id="judul" placeholder="minimal 3 - 50 karakter" class="form-control">
                                            </div>    
                                            <div class="form-group">
                                                <label for="duration" class=" form-control-label" required>Durasi Ujian</label>
                                                <input required type="number" name="duration" id="duration" placeholder="dalam menit" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input required type="submit" name="tambahtes" value="Tambah Tes" class="btn btn-success">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 float-right">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title float-left">Paket Soal yang Tersedia</strong>

                                            <!-- <form class="float-right d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                                <div class="input-group">
                                                    <input id="keyword" type="text" name="keyword" class="form-control border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button id="tombolcari" class="btn btn-primary" type="submit">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form> -->
                                        </div>

                                    <div id="container" class="card-body">
                                        <?php include ("datatables_indexadmin.php");?>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </form> 
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->
                    
    
    <?php
        if( isset($_POST['tambahtes'])){
            $res = mysqli_query($conn, "SELECT * FROM exam_category WHERE judul_to = '$_POST[judul_to]'");
			$count = mysqli_num_rows($res);
			if($count > 0){
					?>
					<script type="text/javascript">
						alert("Judul TO tidak boleh sama!");
					</script>
					<?php
			} else { 
            mysqli_query($conn, "INSERT INTO exam_category VALUES (NULL, '$_POST[kategori]', '$_POST[subtes]', '$_POST[judul_to]', '$_POST[duration]', current_timestamp())");
            ?>
                <script type="text/javascript">
                    alert("Paket Soal Berhasil Ditambahkan");
                    window.location.href = window.location.href;
                </script>
            <?php
            }
        }
        
    ?>
    
                                                
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
        