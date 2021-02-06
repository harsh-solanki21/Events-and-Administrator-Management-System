<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$e_id=$_POST["confirmupd"];

echo "e_id = $e_id <br><br>";

if($_POST)
{
    $s_name = strtolower($_POST['s_name']);
    $marks = $_POST['marks'];
    $att = $_POST['att'];
    $year = $_POST['year'];
    $class = $_POST['class'];
   
    $attendance = ($att * 100)/52;
    $updateExam = "UPDATE exam SET Student_Name = '$s_name',Marks_Obtained = $marks,"
            . "Att = $att, Att_percentage = $attendance WHERE Exam_id = $e_id";
    
    if(mysqli_query($connection, $updateExam))
    {
        echo "<script>alert('Result Updated');window.location.href = 'Exam.php?year=$year&student_class=$class';</script>";
        //header("Location: Exam.php?year=$year&student_class=$class");
    }
    else
    {
        echo "Record Not Updated <br><br>". mysqli_error($connection);
    }
    
    mysqli_close($connection);
}