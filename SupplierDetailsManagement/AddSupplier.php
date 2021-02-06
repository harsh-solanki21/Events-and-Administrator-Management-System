<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['add_supplier']))
{
    $_SESSION['add_supplier']=$_SESSION['add_supplier']+1;
}
else
{
    $_SESSION['add_supplier']=1;
}
$counter=$_SESSION['add_supplier'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Add_Supplier = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}

//Checking Connection
if(!$connection)
{
    die("Connection Failed <br><br>");
}
else
{
   echo "Connection Successfull <br><br>";
}
if($_POST)
{
    $suppliername = strtolower($_POST['supplierName']);
    $supplierphone = $_POST['supplierPhone'];
    $supplieraddress = strtolower($_POST['supplierAddress']);
    $supplierwpn = strtolower($_POST['wpName']);
    $supplierwpa = strtolower($_POST['wpAddress']);
    $supplierwpp = $_POST['wpPhone'];
    
    $insertSupplier = "INSERT INTO supplierdetails "
            . "(Supplier_name,Supplier_phoneNo,Supplier_address,Supplier_WPname,"
            . "Supplier_WPphno,Supplier_WPaddress)"
            . " VALUES ('$suppliername','$supplierphone','$supplieraddress',"
            . "'$supplierwpn','$supplierwpp','$supplierwpa')";
    if(mysqli_query($connection, $insertSupplier))
    {
        echo "<script>alert('Supplier Added');window.location.href = 'Supplier.php';</script>";
        //header("Location: Supplier.php");
    }
    else
    {
        echo "Record Not Inserted <br><br>";
    }
}
