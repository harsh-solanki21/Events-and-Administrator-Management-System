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
    $s_class = strtolower($_POST['s_class']);
    $s_batchYear = $_POST['s_batchYear'];
    
    
    
    $insertStudent = "INSERT INTO student "
            . "(Student_Name,Student_Class,Student_BatchYear)"
            . "VALUES ('$s_name','$s_class',$s_batchYear)";
    
    /*$selectid = "SELECT Student_id from student where Student_name = '$s_name'";
    $result_sid = mysqli_query($connection, $selectid);
    if(mysqli_num_rows($result_sid) > 0)
    {
        while($row=mysqli_fetch_assoc($result_sid))
        {
            $stud_id = $row['Student_id'];
        }
    }*/
    
    $insertStudent_exam = "INSERT INTO exam (Student_Name) Values ('$s_name')";
    
    if(mysqli_query($connection,$insertStudent) && mysqli_query($connection,$insertStudent_exam))
    {
        echo "<script>alert('Student Added');window.location.href = 'Student.php?year=$s_batchYear';</script>";
        //header("Location: Student.php?year=$s_batchYear");
    }
    else
    {
        echo "Record Not Inserted <br><br>";
    }
}
