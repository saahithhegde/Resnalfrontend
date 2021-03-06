<!DOCTYPE html>
<html>
<title>VTU RESULT ANALYSIS</title>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="index.html" class="w3-bar-item w3-button">VTU RESULTS</a>
  <a href="#" class="w3-bar-item w3-button">DEPARTMENT RESULTS</a>
  <a href="collegepos.php" class="w3-bar-item w3-button">COLLEGE POSITION</a>
  <a href="crawlerapi.php" class="w3-bar-item w3-button">FETCH RESULTS</a>
</div>

<div id="main">



<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h1>VTU RESULT ANAYSIS</h1>
  </div>
</div>


<div class="container w3-animate-right">    
        <div id="usnbox" style="margin-top:50px;margin-left: 0%;" class="mainbox col-md-8 col-md-offset-3 col-sm-6 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Get College Position</div>
                     
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
    
                       
                                    
                            <div style="margin-top: 25px" class="select2">
                                       
                                        <select id="sem" type="text" class="form-control" name="selectsem" required value=""> 
                                            <option class="form-control" value="sem1">SEM1</option>
                                            <option class="form-control" value="sem2">SEM2</option>
                                            <option class="form-control" value="sem3">SEM3</option>
                                            <option class="form-control" value="sem4">SEM4</option>
                                            <option class="form-control" value="sem5">SEM5</option>
                                            <option class="form-control" value="sem6">SEM6</option>
                                            <option class="form-control" value="sem7">SEM7</option>
                                            <option class="form-control" value="sem8">SEM8</option>

                                            </select>    
                                         
                                    </div>
                                              
                               
                                  <div style="margin-top:20px" class="form-group">
                                    <div class="col-sm-12 controls">
                                      <a id="btn-login1" class="btn btn-success">Get subjects</a>
                                    </div>
                                </div>
                                      <br>
                                     <div style="margin-top: 45px" class="form-group">
                                         <select id="subs" type="text" class="form-control" name="selectsem">
                                         </select>
                                     </div>

                                <div style="margin-top:20px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                      <a id="btn-login2" class="btn btn-success">GET ANALYSIS</a>
                                    </div>
                                </div>                             
                          
                        </div>                     
                      </div>  
                  </div>

         <div id="div1" class="container-fluid"></div>
            </div>

            <script>
$(document).ready(function(){
    $("#btn-login1").click(function(){
        var sem=$("#sem").val();
     $.ajax({
        method:'POST',
        url: 'getsubject.php',
        data: {'sem':sem}
    }).done(function (data) {
    $('#subs').html(data);
    });
    });
});
</script>

<script>
$(document).ready(function(){
    $("#btn-login2").click(function(){
        var sub=$("#subs").val();
        var sem=$("#sem").val();
     $.ajax({
        method:'POST',
        url: 'getanalysis.php',
        data: {'subs':sub,
                'sem':sem}
    }).done(function (data) {
    $('#div1').html(data);
    });
    });
});
</script>


</div>

<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "30%";
  document.getElementById("mySidebar").style.width = "30%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}


</script>