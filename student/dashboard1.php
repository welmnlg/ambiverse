<?php 
    include("../includes/functions.php");
    include("header_ujian.php"); 
?>
<!-- CONTENT AREA --->
            <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

                <div class="col-lg-12" style="background-color: white;">
                    <div class="row">
                        <div class="card card-body shadow text-right">
                            Countdown Timer
                        </div>
                    </div>
                </div>
                <br>
            </div>
                    
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="text-center col-lg-4">
                    <div class="card-body bg-white shadow" style="min-height: 300px; margin: 0 auto;">
                        <h4>Selamat datang di halaman tryout 
                            <?php 
                                $res = mysqli_query($conn, "SELECT * FROM exam_category WHERE id = $_GET[id]");
                                while ($row = mysqli_fetch_array($res)){
                                    $judul_to = $row["judul_to"];
                                    $duration = $row["duration"];
                                }
                                echo $judul_to;
                            ?>! 
                            <br>
                            <h5>Waktu pengerjaan tes ini adalah <i style="color: red"; font-weight="bold"><?= $duration; ?> menit</i>.</h5><br>
                            <i>INGAT! Tes akan berakhir secara otomatis apabila waktu pada kanan atas halaman web habis atau apabila anda mengklik tombol Next pada soal terakhir.</i>
                            <br><br>
                        <h6>Klik tombol Start untuk segera memulai Try Out.</h6>
                        <a class="btn btn-primary" href="dashboard.php?id=<?= $_GET['id'] ?>" data-toggle="modal" data-target="#startModal">
                            Start TO? 
                        </a>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <br><br><br><br>
                </div>
            </div>

        </div>




<div class="modal fade" id="startModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Panel konfimasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik tombol "Mulai" di bawah jika sudah yakin untuk mengikuti Tryout <?= $judul_to ?>. <br> 
                                        Timer akan berjalan setelah tombol Start diklik.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <?php
                    $res = mysqli_query($conn, "SELECT * FROM exam_category WHERE id = $_GET[id]");
                    while($row = mysqli_fetch_array($res)){
                        $judul_to = $row["judul_to"];
                        ?>
                        <input type="button" class="btn btn-success" value="Mulai" style="margin-top: 10px" onclick="set_exam_type_session(this.value);">
                        <?php
                    }
                ?>
                </div>
            </div>
        </div>
</div>
            </div>
                
        </div>
<script type="text/javascript">
    function set_exam_type_session(judul_to){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "../forajax/set_exam_type_session.php?judul_to=<?=$judul_to;?>";
            }
        };
        xmlhttp.open("GET","../forajax/set_exam_type_session.php?judul_to="+ judul_to,true);
        xmlhttp.send(null);
    }
</script>  
<?php include("footer.php");
