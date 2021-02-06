<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$e_id=$_POST["confirmdel"];
$delresult = "DELETE FROM exam where Exam_id='$e_id'";

if(mysqli_query($connection, $delresult))
{
    header("Location: Exam.php");
}
else
{
    echo "Record not Deleted";
}