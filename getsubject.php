<?php
$sem = $_POST["sem"]; 
$semester='';
$semval='';

if($sem=='sem1')
{


}
else if($sem=='sem2')
{
    $semester='semester 2';
    
}
else if($sem=='sem3')
{
    $semester='semester 3';
    $semval='%1BI16%';
    $subjects=array("15MAT31","15CS32","15CS33","15CS34","15CS35","15CS36","15CSL37","15CSL38");
}
else if($sem=='sem4')
{
    $semester='semester 4';
   
}
else if($sem=='sem5')
{
    $semester='semester 5';
    $semval='%1BI15%';
    $subjects=array("15CS51","15CS52","15CS51","15CS553","15CS54","15CS565","15CSL57","15CSL58","15CS564");

}
else if($sem=='sem6')
{
    $semester='semester 6';
    
}
else if($sem=='sem7')
{
    $semester='semester 7';
    $semval='%1BI14%';
}
else if($sem=='sem8')
{
    
}
?>
<option class="form-control" value="<?php echo ($subjects[0]);?>"><?php echo ($subjects[0]);?></option>
<option class="form-control" value="<?php echo ($subjects[1]);?>"><?php echo ($subjects[1]);?></option>
<option class="form-control" value="<?php echo ($subjects[2]);?>"><?php echo ($subjects[2]);?></option>
<option class="form-control" value="<?php echo ($subjects[3]);?>"><?php echo ($subjects[3]);?></option>
<option class="form-control" value="<?php echo ($subjects[4]);?>"><?php echo ($subjects[4]);?></option>
<option class="form-control" value="<?php echo ($subjects[5]);?>"><?php echo ($subjects[5]);?></option>
<option class="form-control" value="<?php echo ($subjects[6]);?>"><?php echo ($subjects[6]);?></option>
<option class="form-control" value="<?php echo ($subjects[7]);?>"><?php echo ($subjects[7]);?></option>

