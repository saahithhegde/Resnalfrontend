<?php
$sem = $_POST["sem"]; 
$semester='';
$semval='';

if($sem=='sem 1')
{
    $semester='semester 1';
    $semval='%1BI17%';

}
else if($sem=='sem 2')
{
    $semester='semester 2';
    
}
else if($sem=='sem 3')
{
    $semester='semester 3';
    $semval='%1BI16%';
    $subjects=array("15MAT31","15CS32","15CS33","15CS34","15CS35","15CS36","15CSL37","15CSL38");
}
else if($sem=='sem 4')
{
    $semester='semester 4';
   
}
else if($sem=='sem 5')
{
    $semester='semester 5';
    $semval='%1BI15%';
    $subjects=array("15CS51","15CS52","15CS51","15CS553","15CS54","15CS565","15CSL57","15CSL58","15CS564");

}
else if($sem=='sem 6')
{
    $semester='semester 6';
    
}
else if($sem=='sem 7')
{
    $semester='semester 7';
    $semval='%1BI14%';
}
else if($sem=='sem 8')
{
    $semester='semester 8';
    $semval='sem8';
}

?>
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
<script src="RGraph.svg.common.core.js"></script>
<script src="RGraph.svg.common.key.js"></script>
<script src="RGraph.svg.common.tooltips.js"></script>
<script src="RGraph.svg.pie.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container-fluid">
<div class="limiter">
<h2>Rank Holders Top 10 For <?php echo $semester; ?></h2>
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
                    <table data-vertable="ver1">
                        <thead>
                            <tr class="row100 head">

                                <th class="column100 column1" data-column="column1">usn</th>
                                <th class="column100 column2" data-column="column2">name</th>
                                <th class="column100 column2" data-column="column2">sgpa</th>
                                <th class="column100 column2" data-column="column2">rank</th>

                            </tr>
                        </thead>
                        <tbody>
                        	  <?php
                        	    
                            	$database= new SQLite3("resanal.db");
                            	$sql='select * from Student where usn like "'.$semval.'" order by gpa desc;';
                                $result = $database->query($sql);
                                $i =1;
                                while ($row =$result->fetchArray()) 
                                { 

                                ?>
                               
                            <tr class="row100">
                            
                                <td class="column100 column1" data-column="column1"><?php echo $row["USN"]; ?></td>
                                <td class="column100 column2" data-column="column2"><?php echo $row["Name"]; ?></td>
                                <td class="column100 column2" data-column="column2"><?php echo $row["GPA"]; ?></td>
                                <td class="column100 column2" data-column="column2"><?php echo ($i); ?></td>
                               
                            </tr>
                            <?php
                                 $i++;
                                 if($i==11)
                                 	break;
                                  }
                                 ?>



                        </tbody>

                    </table>
                </div>
</div>
</div>
</div>
</div>
<div class="container-fluid" style="margin-top:50px;margin-left: 10%;">
<?php
if (isset($subjects[0]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[0].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
    $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>


    <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container1">    
</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc;?>;
    new RGraph.SVG.Pie({
        id: 'chart-container1',
        data: [fail,pass],
        options: {
           
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>

 <?php
  }
}
 ?>

<?php
if (isset($subjects[1]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[1].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
    $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>
       <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container2">

</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container2',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
 <?php
  }
}
 ?>

 <?php
 if (isset($subjects[2]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[2].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
    $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>
    <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container3">

</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container3',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
 <?php
  }
}
 ?>




 <?php
 if (isset($subjects[3]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[3].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
     $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>
        <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container4"></div>

<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container4',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
 <?php
  }
}
 ?>





 <?php
 if (isset($subjects[4]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[4].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
     $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>
<p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container5">
        
</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container5',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
 <?php
  }
}
 ?>





 <?php
 if (isset($subjects[5]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[5].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
     $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>

          <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container6">
</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container6',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
 <?php
  }
}
 ?>





 <?php
 if (isset($subjects[6]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[6].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
     $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>
          <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container7"> 
</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container7',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
 <?php
  }
}
 ?>





 <?php
 if (isset($subjects[7]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[7].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
     $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>
        <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container8">
 
</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container8',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
 <?php
  }
}
 ?>



 <?php
 if (isset($subjects[8]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[8].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
     $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>
        <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container9">
 
</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container9',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
 <?php
  }
}
 ?>


 <?php
 if (isset($subjects[9]))
{
$database= new SQLite3("resanal.db");
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[9].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
     $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>
 <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container10">
       
</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container10',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
 <?php
  }
}
 ?>

  <?php
$database= new SQLite3("resanal.db");
if (isset($subjects[10]))
{
$sql= 'select sub_name,pass_count,fail_count,total_count from Subjects where sub_code="'.$subjects[10].'"';
$result = $database->query($sql);
while ($row =$result->fetchArray()) 
{ 
     $subject=$row["sub_name"];
    $passperc=($row["pass_count"]/$row["total_count"])*100;
    $failperc=($row["fail_count"]/$row["total_count"])*100;

?>
         <p style"color:blue"><?php echo ($subject.'<br>Total Pass:'.$row["pass_count"].'<br>Total Fail:'.$row["fail_count"].'<br>Total Students:'.$row["total_count"]);?></p>
<div style="width:450px; height: 250px;margin-top:10px; margin-left: 4%;" id="chart-container11">

</div>
<script>
    
    var pass= <?php echo $passperc;?>;
    var fail= <?php echo $failperc?>;
    new RGraph.SVG.Pie({
        id: 'chart-container11',
        data: [fail,pass],
        options: {
            
            tooltipsEvent: 'mousemove',
            highlightStyle: 'outline',
            labelsSticksHlength: 50,
            tooltips: [fail,pass],
            key: ['fail','pass']
        }
    }).draw();
</script>
</div>
 <?php
  }
}
 ?>




