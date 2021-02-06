<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['update_supplier']))
{
    $_SESSION['update_supplier']=$_SESSION['update_supplier']+1;
}
else
{
    $_SESSION['update_supplier']=1;
}
$counter=$_SESSION['update_supplier'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Edit_Supplier = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}

$sid=$_POST["confirmupd"];
echo "Sid = $sid <br><br>";
if($_POST)
{
    $suppliername = strtolower($_POST['supplierName']);
    $supplierphone = $_POST['supplierPhone'];
    $supplieraddress = strtolower($_POST['supplierAddress']);
    $supplierwpn = strtolower($_POST['wpName']);
    $supplierwpa = trim(strtolower($_POST['wpAddress']));
    $supplierwpp = $_POST['wpPhone'];
    
    echo "$suppliername<br>";
    echo "$supplierphone<br>";
    echo "$supplieraddress<br>";
    echo "$supplierwpn<br>";
    echo "$supplierwpa <br>";
    echo "$supplierwpn <br><br>";
    
    
    $updateSupplier = "UPDATE supplierdetails SET "
            . "Supplier_name = '$suppliername',Supplier_phoneNo = '$supplierphone',"
            . "Supplier_address = '$supplieraddress',Supplier_WPname = '$supplierwpn',"
            . "Supplier_WPphno = '$supplierwpp',Supplier_WPaddress = '$supplierwpa'"
            . "WHERE Supplier_id = $sid";
    if(mysqli_query($connection, $updateSupplier))
    {
        echo "<script>alert('Supplier Updated');window.location.href = 'Supplier.php';</script>";
        //header("Location: Supplier.php");
    }
    else
    {
        echo "Record Not Updated <br><br>". mysqli_error($connection);
    }
    
    mysqli_close($connection);
}