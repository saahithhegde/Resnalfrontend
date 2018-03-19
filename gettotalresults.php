<?php
$sem= $_POST["sem"]; 
$semval='';
if($sem=='sem1')
{
    $semester='semester 1';
    
}
else if($sem=='sem2')
{
    $semester='semester 2';    
}
else if($sem=='sem3')
{
    $semester='semester 3';
    $semval='%1BI16%';
}
else if($sem=='sem4')
{
    $semester='semester 4';
   
}
else if($sem=='sem5')
{
    $semester='semester 5';
    $semval='%1BI15%';
   
}
else if($sem=='sem6')
{
    $semester='semester 6';
    
}
else if($sem=='sem7')
{
    $semester='semester 7';
    
}
else if($sem=='sem8')
{
    $semester='semester 8';
    
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container-fluid">
<h2>The Results Of:<?php echo $semester;?>
<div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
                    <table data-vertable="ver1">
                        <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" data-column="column1">USN</th>
                                <th class="column100 column2" data-column="column2">Subject</th>
                                <th class="column100 column3" data-column="column3">Internals</th>
                                <th class="column100 column4" data-column="column4">Externals</th>
                                <th class="column100 column5" data-column="column5">Pass/Fail</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                $database= new SQLite3("resanal.db");
                                $sql='select * from Marks where USN like "'.$semval.'"';
                                $result = $database->query($sql);
                                $i =1;
                                while ($row =$result->fetchArray()) 
                                { 

                                ?>
                            <tr class="row100">
                                <td class="column100 column1" data-column="column1"><?php echo $row["USN"]; ?></td>
                                <td class="column100 column2" data-column="column2"><?php echo $row["internals"]; ?></td>
                                <td class="column100 column3" data-column="column3"><?php echo $row["externals"]; ?></td>
                                <td class="column100 column4" data-column="column4"><?php echo $row["total_marks"]; ?></td>
                                <?php if($row["condition"]==1) 
                                {
                                    echo'<td class="column100 column5" data-column="column5">pass</td>';
                                }
                                else
                                {
                                    echo'<td class="column100 column5" style="color: red" data-column="column5">fail</td>';
                                }
                                
                                ?>
                            </tr>
                 <?php
                   }
                   ?>

                        </tbody>

                    </table>
                </div>


</div>