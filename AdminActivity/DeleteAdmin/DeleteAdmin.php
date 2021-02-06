<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['Delete_Admin']))
{
    $_SESSION['Delete_Admin']=$_SESSION['Delete_Admin']+1;
}
else
{
    $_SESSION['Delete_Admin']=1;
}
$counter=$_SESSION['Delete_Admin'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Delete_Admin = $counter WHERE Session_id = $sesid";
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
    $delAdmin = $_POST["admin"];
    $deleteAdmin = "DELETE FROM admin WHERE Admin_id = $delAdmin";
    
    if(mysqli_query($connection, $deleteAdmin))
    {
        header("Location: AdminDeleted.html");
    }
    else
    {
        echo "Admin not Deleted";
    }
}
