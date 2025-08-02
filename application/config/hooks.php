<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');
$conn = mysqli_connect("localhost", "root", "");
if($conn === false){ echo "<script type='text/javascript'>alert(\"Contact To Msceia Team...!!!\");</script>"; }
$val =FALSE;
$sql = "CREATE DATABASE IF NOT EXISTS elearn_aug_19";
mysqli_query($conn, $sql);
$conn = mysqli_connect('localhost','root', '', 'elearn_aug_19');
mysqli_set_charset($conn,"utf8");
$selectdb = mysqli_select_db($conn, 'elearn_aug_19') or die('Contact to msceia team...');
$val = mysqli_query($conn, 'SELECT ts.stud_id from tbl_student as ts, tbl_letter as tw, tbl_statement as te, tbl_email as tm, tbl_speed as tp, tbl_institute as ti limit 1');
if($val == FALSE) 
{
	$templine = '';
    $lines = file('./db/elearn_aug_19.sql');
    $cnt =  count($lines);
    foreach ($lines as $line) {
        if(substr($line, 0, 2)== '__' || $line == '' || substr($line, 0, 2) == '/*')
            continue;
        $templine .= $line;
        if(substr(trim($line), -1, 1)==';')
        {
            mysqli_query($conn, $templine) or print('Error');
            $templine = '';
        } 
    }
}*/
?>