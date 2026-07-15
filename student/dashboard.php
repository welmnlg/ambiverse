<?php 
    include("../includes/functions.php");
    include("header_ujian.php"); 
    $judul_to = $_GET["judul_to"];
    
        $_SESSION["judul_to"] = $judul_to;
    
?>
<!-- CONTENT AREA --->
        <div class="row col-lg-12" style="margin: 0px; padding:0px; margin-bottom: 50px;">

                <div class="col-lg-12" style="background-color: white;">
                    <br>
                    <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
                        <div class="col-lg-12" style="background-color: white;">
                            <div class="row">
                                <div id="countdowntimer" class="card card-body shadow text-right"></div>
                            </div>
                        </div>
                    <br>
                    </div>
                </div>
        </div>
                <!-- mulai dari sini -->
        <div class="row col-lg-12">  
            <div class="col-lg-2 ml-5">
                <div id="current_que" style="float: left">0</div>
                <div style="float: left">/</div>
                <div id="total_que" style="float: left">0</div>
            </div>
            <div class="col-lg-8" style="min-height: 300px; background-color: white;" id="load_questions"></div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row col-lg-12" style="margin-top: 10px">
            <div class="col-lg-2" style="min-height: 50px"></div>
            <div class="col-lg-8 text-center">
                <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();"> &nbsp;
                <input type="button" class="btn btn-success" value="Next" onclick="load_next();">
            </div>
            <div class="col-lg-2"></div>    
        </div>
                <!-- selesai di sini -->
    </div>
                
        
<script type="text/javascript">
    setInterval(function(){
        timer();
    },1000);
    function timer(){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText=="00:00:01"){
                    window.location="result.php";
                }
                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","../forajax/load_timer.php",true);
        xmlhttp.send(null);
    }
</script>

<script type="text/javascript">
    function load_total_que() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","../forajax/load_total_que.php",true);
        xmlhttp.send(null);
    }
    
    var questionno="1";
    load_questions(questionno);

    function load_questions(questionno){
        document.getElementById("current_que").innerHTML=questionno;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "over"){
                    window.location = "result.php";
                } else {
                    document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                    load_total_que();
                }
            }
        };
        xmlhttp.open("GET","../forajax/load_questions.php?questionno="+ questionno,true);
        xmlhttp.send(null);
    }

    function radioclick(radiovalue, questionno) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
            }
        };
        xmlhttp.open("GET","../forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+ radiovalue,true);
        xmlhttp.send(null);
    }


    function load_previous() {
        if(questionno == "1"){
            load_questions(questionno);
        } else{
            questionno = eval(questionno) - 1;
            load_questions(questionno);
        }
    }

    function load_next() {
        questionno = eval(questionno) + 1;
        load_questions(questionno);
    }
</script>

<?php include("footer.php");