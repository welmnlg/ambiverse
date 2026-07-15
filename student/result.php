<?php 
    session_start();
    $date = date("Y-m-d H:i:s");
    $_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));
    include("header.php"); 
    include("../includes/functions.php");
?>
<!-- CONTENT AREA --->
        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
            
            <div class="col-lg-12 col-lg-push-3" style="min-height: 500px; background-color: white;">
            <h4 class="text-center mt-5">Try Out Selesai! :D</h4><br>
                <?php
                    $correct = 0;
                    $wrong   = 0;

                    if( isset($_SESSION["answer"]) ){
                        for($i = 1; $i <= sizeof($_SESSION["answer"]); $i++){
                            $answer = "";
                            $res = mysqli_query($conn, "SELECT * FROM questions WHERE judul_to = '$_SESSION[judul_to]' && question_no = $i");
                            while ($row = mysqli_fetch_array($res)){
                                $answer = $row["answer"];
                                $res1 = mysqli_query($conn, "SELECT * FROM exam_category");
                                    while ($row1 = mysqli_fetch_array($res1)){
                                        if($row1["judul_to"] == $_SESSION["judul_to"]){
                                            $subtes = $row1["subtes"];
                                        }
                                }
                            }
                            if( isset($_SESSION["answer"][$i])){        //isset user milih jawaban ini:
                                if($answer == $_SESSION["answer"][$i]){ //kalau pilihan user = var jb dari database,
                                    $correct = $correct + 1;            //var correct + 1, else var wrong + 1.
                                } else {
                                    $wrong = $wrong + 1;
                                }
                            } else {
                                $wrong = $wrong + 1;                    //kalau user ga milih jb apa"
                            }
                        }
                    }
                    $count = 0;
                    $res = mysqli_query($conn, "SELECT * FROM questions WHERE judul_to = '$_SESSION[judul_to]'");
                    $count = mysqli_num_rows($res);
                    $wrong = $count - $correct;
                    ?>
                    <br><br>
                    <div class="row">
                        
                        <div class="col-lg-4"></div>
                        <div class="card col-lg-4 text-center pt-4">
                        <center>
                            <h5>Jumlah Soal  = <?= $count;?></h5> <br>
                            <h5>Soal Benar  = <?= $correct;?></h5> <br>
                            <h5>Soal Salah  = <?= $wrong;?></h5> <br>
                        </center>
                        </div>
                        <div class="col-lg-4"></div>
                        
                    </div>
                    <div class="row"><br><br></div>
                    <div class="row text-center">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <a href="hasil_to.php" class="btn btn-primary">Lihat Hasil</a>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                   
            </div>
                
        </div>
<?php
    
    if( isset($_SESSION["exam_start"]) ){ 
        date("Y-m-d");
        mysqli_query($conn, "INSERT INTO exam_results VALUES (NULL, '$_SESSION[username]', '$_SESSION[judul_to]', '$subtes', '$count', '$correct', '$wrong', '$date')");
    }
    
    if( isset($_SESSION["exam_start"]) ){
        unset($_SESSION["exam_start"]);
        ?>
        <script type="text/javascript">
            window.location.href = window.location.href;
        </script>
        <?php
    }

?>
        
<?php include("footer.php");