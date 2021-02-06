<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['Add_Admin']))
{
    $_SESSION['Add_Admin']=$_SESSION['Add_Admin']+1;
}
else
{
    $_SESSION['Add_Admin']=1;
}
$counter=$_SESSION['Add_Admin'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Add_Admin = $counter WHERE Session_id = $sesid";
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
    $NAName = $_POST["NAName"];
    $NAUsername = $_POST["NAUsername"];
    $NAPassword = $_POST["NAPassword"];
    $NAEmail = $_POST["NAEmail"];
    
    $count = mysqli_query($connection,"SELECT COUNT(*) FROM admin");
    while($row = mysqli_fetch_assoc($count))
    {
        $countadmin = $row["COUNT(*)"];
    }
    //echo $countadmin;
    
    if($countadmin < 3)
    {
        $insertNewAdmin = "INSERT INTO admin(Username,Password,Admin_name,Admin_email)"
            . "VALUES ('$NAUsername','$NAPassword','$NAName','$NAEmail')";
        if(mysqli_query($connection, $insertNewAdmin))
        {
            header("Location: AdminAdded.html");
        }
        else
        {
            echo "New Admin Not Added";
        }
    }
    else
    {
        header("Location: AdminLimitReached.html");
    }
}
