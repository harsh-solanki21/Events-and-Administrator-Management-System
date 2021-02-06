<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$Docformat_id = $_POST['confirmdel'];
echo $Docformat_id;
$deletedoc = "DELETE FROM documentformat WHERE DocFormat_id = $Docformat_id";

if(mysqli_query($connection, $deletedoc))
{
    echo "<script>alert('Certificate Deleted');window.location.href = 'View_Certificate.php';</script>";
    header("Location: View_Certificate.php");
}
else
{
    echo "Document Not Deleted";
}
?>

