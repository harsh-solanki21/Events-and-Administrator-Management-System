<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
//Checking Connection
if(!$connection)
{
    die("Connection Failed <br><br>");
}
else
{
   //echo "Connection Successfull <br><br>";
}

if($_POST)
{
    $s_name = strtolower($_POST['s_name']);
    $marks = $_POST['marks'];
    $att = $_POST['att'];
    
    /*$attend_percent = "SELECT Fix_Att from exam";
    $result_ap = mysqli_query($connection, $result_ap);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $fixed_attend = $row['Fix_Att'];
        }
    }*/
    $attendance = ($att * 100)/52;
    //echo $attendance;
    $insertExam = "INSERT INTO exam (Student_Name, Marks_Obtained, Att, Att_percentage)"
            . " VALUES ('$s_name',$marks,$att,$attendance)";
    
    if(mysqli_query($connection, $insertExam))
    {
        echo "Record Inserted <br><br>";
        header("Location: Exam.php");
    }
    else
    {
        echo "Record Not Inserted <br><br>";
    }
}
