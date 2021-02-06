<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$Doc_id = $_POST['confirmdel'];
echo $Doc_id;
$deletedoc = "DELETE FROM document WHERE Doc_id = $Doc_id";

if(mysqli_query($connection, $deletedoc))
{
    echo "<script>alert('Document Deleted');window.location.href = 'View_LegalCases.php';</script>";
    //header("Location: View_LegalCases.php");
}
else
{
    echo "Document Not Deleted";
}
?>

