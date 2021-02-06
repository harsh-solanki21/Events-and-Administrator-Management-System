<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
session_start();

$logout_time = date("G:i:s");

echo $logout_time."<br>";
echo $_SESSION["sid"];

$logout_qry = "UPDATE adminsession SET Logout_time = '$logout_time'"
        . "WHERE Session_id =".$_SESSION["sid"];
mysqli_query($connection, $logout_qry);

session_unset();
//unset($_SESSION['sid']);
session_destroy();

header("Location: LoginPage.html");

/*
session_start();
if(isset($_SESSION['']))
{
    $_SESSION['']=$_SESSION['']+1;
}
else
{
    $_SESSION['']=1;
}
$counter=$_SESSION[''];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET  = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}
*/
