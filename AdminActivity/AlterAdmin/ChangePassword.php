<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['Change_Password']))
{
    $_SESSION['Change_Password']=$_SESSION['']+1;
}
else
{
    $_SESSION['Change_Password']=1;
}
$counter=$_SESSION['Change_Password'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Change_Password = $counter WHERE Session_id = $sesid";
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
    $new_pwd = $_POST["newpassword"];
    $update_pwd = "UPDATE admin SET Password = '$new_pwd' WHERE Admin_name = '$user_admin'";
    if(mysqli_query($connection, $update_pwd))
    {
        echo "<script>alert('Password Changed');window.location.href = 'PasswordUpdated.html';</script>";
        //header("Location: PasswordUpdated.html");
    }
    /*else
    {
        echo "Password NOT Updated";
    }*/
}
        