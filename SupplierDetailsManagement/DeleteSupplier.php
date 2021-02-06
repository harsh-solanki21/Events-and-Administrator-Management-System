<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['delete_supplier']))
{
    $_SESSION['delete_supplier']=$_SESSION['delete_supplier']+1;
}
else
{
    $_SESSION['delete_supplier']=1;
}
$counter=$_SESSION['delete_supplier'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Delete_Supplier = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}

$sid=$_POST["confirmdel"];
$deleteSupplier = "DELETE FROM supplierdetails where Supplier_id='$sid'";

if(mysqli_query($connection, $deleteSupplier))
{
    echo "<script>alert('Supplier Deleted');window.location.href = 'Supplier.php';</script>";
    //header("Location: Supplier.php");
}
else
{
    echo "Supplier not Deleted";
}