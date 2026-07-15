<?php 
    session_start();
    include("header.php"); 
    include("../includes/functions.php");

?>
<!-- CONTENT AREA --->
        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-12 col-lg-push-3" style="min-height: 500px; background-color: white; text-align:center;padding:30px;">
            
                <?php
                    $res = mysqli_query($conn, "SELECT * FROM exam_results WHERE judul_to = '$_GET[judul_to]' ORDER BY correct_answer*3+wrong_answer*-1 DESC");
                    
                    $count = mysqli_num_rows($res);
                    $no=0;
                    $rangking = 1;
                    
                    if($count == 0){
        
                    } else {
                        ?>
                        <h3>Leaderboard <?= $_GET["judul_to"];?><i></i></h3><br><br>
                        <table class="table table-bordered">
                            <tr style="background-color: #1f1340; color: white;">
                                <th>Rangking</th>
                                <th>Username</th>
                                <th>Nilai</th>
                            </tr>
                        
                        <?php
                            while ($row = mysqli_fetch_array($res)){
                                $no++;
                                $skor = $row["correct_answer"] * 3 + $row["wrong_answer"] * -1;
                                echo "<tr>";
                                    echo "<td>"; echo $rangking; echo "</td>";
                                    echo "<td>"; echo $row["username"]; echo "</td>";
                                    echo "<td>"; echo $skor; echo "</td>";
                                    $rangking++;
                                echo "</tr>";
                            }
                        echo "</table>";
                    }
                ?>
            </div>
                
        </div>
        
<?php include("footer.php");