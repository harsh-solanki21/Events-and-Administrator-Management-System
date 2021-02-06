<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$s_id=$_GET["student_id"];
$oldname=$_GET['oldname'];
echo $oldname;


if($_POST)
{
    $s_name = strtolower($_POST['s_name']);
    $s_class = strtolower($_POST['s_class']);
    $s_batchYear = $_POST['s_batchYear'];
    
    $updateStudent = "UPDATE student SET Student_Name = '$s_name',Student_Class = '$s_class',"
            . "Student_BatchYear = $s_batchYear WHERE Student_id = $s_id";
    
    $updateexamStudent = "UPDATE exam SET Student_Name = '$s_name' WHERE Student_Name = '$oldname'";
    if(mysqli_query($connection, $updateStudent) && mysqli_query($connection, $updateexamStudent))
    {
        echo "<script>alert('Student Updated');window.location.href = 'Student.php?year=$s_batchYear';</script>";
        //header("Location: Student.php?year=$s_batchYear");
    }
    else
    {
        echo "Record Not Updated <br><br>". mysqli_error($connection);
    }
    
    mysqli_close($connection);
}