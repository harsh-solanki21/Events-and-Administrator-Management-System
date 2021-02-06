<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['delete_family']))
{
    $_SESSION['delete_family']=$_SESSION['delete_family']+1;
}
else
{
    $_SESSION['delete_family']=1;
}
$counter=$_SESSION['delete_family'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Delete_family = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}


if($_POST)
{
    $delfam = $_POST["famid"];
    $deletefam = "DELETE FROM familydetails WHERE Family_id = $delfam";
    if(mysqli_query($connection, $deletefam))
    {
        echo "<script>alert('Family Deleted');window.location.href = 'MemberDetails.php';</script>";
        header("Location: MemberDetails.php");
    }
    else
    {
        echo "Family Not Deleted";
    }
    
}