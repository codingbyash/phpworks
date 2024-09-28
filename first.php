<?php  
$sub1 = 50.5;  
$sub2 = 50.6;  
$sub3 = 50.5;  
$sub4 = 58.5;  
$sub5 = 60.5;  
$sub6 = 80.5;  
$sub7 = 60.5;  

$per = (($sub1 + $sub2 + $sub3 + $sub4 + $sub5) / 5.0);  

$percentage = $per * 100;  

echo number_format($percentage, 2) . " %";  

?>