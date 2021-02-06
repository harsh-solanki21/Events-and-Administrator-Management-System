<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$Report_id = $_POST['confirmdel'];
echo $Report_id;
$deleterep = "DELETE FROM reports WHERE Report_id = $Report_id";

if(mysqli_query($connection, $deleterep))
{
    echo "<script>alert('Report Deleted');window.location.href = 'View_Reports_Pastor.php';</script>";
    //header("Location: View_Reports_Pastor.php");
}
else
{
    echo "Report Not Deleted";
}
?>

