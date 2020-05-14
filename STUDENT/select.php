<?php
//error_reporting(E_ALL);

//ini_set("display_errors", "On");

//ini_set("error_log", "/var/log/apache2/proj1_error");

include('db.php');
$sclass = $_REQUEST['stu_class'];


/*

Connect to your database
fetch the sections for your class
*/

$sql="SELECT  `No_of_sections` FROM `class` WHERE Class='$sclass'";
 $result1 = mysqli_query($conn,$sql);
 $data=mysqli_fetch_assoc($result1);
 $NoOfSections=$data['No_of_sections'];

 //$NoOfSections=array($NoOfSectionsInDb);
 for($i=1;$i<=$NoOfSections;$i++)
 {
     $sum=64+$i;
     $sec=chr($sum);
     $section[] = $sec;
     
 }
 




//print_r($myArr);


//$section = array('A', 'B', 'C');

// Converting Array to JSON format

echo json_encode($section);

// ["A","B","C"]

exit;

?>