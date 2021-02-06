<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);


$user_admin = $_GET['user'];
echo $user_admin."<br>";
if($_POST)
{
    $new_pwd = $_POST["newpassword"];
    echo $new_pwd."<br>";
    $update_pwd = "UPDATE admin SET Password = '$new_pwd' WHERE Username = '$user_admin'";
    if(mysqli_query($connection, $update_pwd))
    {
        echo "Password Updated";
        header("Location: LoginPage.html");
        
    }
    else
    {
        echo "Password NOT Updated";
    }
}
        