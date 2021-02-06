<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['Change_Username']))
{
    $_SESSION['Change_Username']=$_SESSION['']+1;
}
else
{
    $_SESSION['Change_Username']=1;
}
$counter=$_SESSION['Change_Username'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Change_Username = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}

$user_admin = $_GET['user'];
echo $user_admin;
if($_POST)
{
    $new_uname = $_POST["newusername"];
    $update_uname = "UPDATE admin SET Username = '$new_uname' WHERE Admin_name = '$user_admin'";
    if(mysqli_query($connection, $update_uname))
    {
        echo "<script>alert('Password Updated');window.location.href = 'UsernameUpdated.html';</script>";
        //header("Location: UsernameUpdated.html");
    }
    /*else
    {
        echo "Password NOT Updated";
    }*/
}
        