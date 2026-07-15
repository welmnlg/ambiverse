<?php
    session_start();
    include("../includes/functions.php");

    $question_no = "";
    $question    = "";
    $opt1        = "";
    $opt2        = "";
    $opt3        = "";
    $opt4        = "";
    $answer      = "";
    $count       = "";
    $ans         = "";

    $queno = $_GET["questionno"];
    if( isset($_SESSION["answer"][$queno])){
        $ans = $_SESSION["answer"][$queno]; //waktu opsi nya udah dipilih terus mau liat soal sebelumnya lagi jadi bisa tersimpan
    }

    $res = mysqli_query($conn, "SELECT * FROM questions WHERE judul_to = '$_SESSION[judul_to]' && question_no = $_GET[questionno]");
    $count = mysqli_num_rows($res);

    if($count == 0){
        echo "over";
    } else {
        while ($row = mysqli_fetch_array($res)){
            $question_no = $row["question_no"];
            $question    = $row["question"];
            $opt1        = $row["opt1"];
            $opt2        = $row["opt2"];
            $opt3        = $row["opt3"];
            $opt4        = $row["opt4"];
            $answer      = $row["answer"];
        }
        ?>
        <br>
        <table>
            <tr>
                <td style="font-size: 18px; font-weight: bold; padding-left: 5px;" colspan=2>
                    <?php echo "(".$question_no.") ". $question; ?>
                </td>
            </tr>
        </table>
        <table style="margin-left: 10px">
            <tr>
                <td>
                    <input type="radio" name="r1" id="opt1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value, <?= $question_no; ?>)"
                    <?php
                        if($ans == $opt1){
                            echo "checked";
                        }
                    ?>> <?php echo $opt1; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="r1" id="opt2" value="<?php echo $opt2; ?>" onclick="radioclick(this.value, <?= $question_no; ?>)"
                    <?php
                        if($ans == $opt2){
                            echo "checked";
                        }
                    ?>> <?php echo $opt2; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="r1" id="opt3" value="<?php echo $opt3; ?>" onclick="radioclick(this.value, <?= $question_no; ?>)"
                    <?php
                        if($ans == $opt3){
                            echo "checked";
                        }
                    ?>> <?php echo $opt3; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="r1" id="opt4" value="<?php echo $opt4; ?>" onclick="radioclick(this.value, <?= $question_no; ?>)"
                    <?php
                        if($ans == $opt4){
                            echo "checked";
                        }
                    ?>> <?php echo $opt4; ?>
                </td>
            </tr>
                
                
               
            
        </table>
        <?php
    }

?>