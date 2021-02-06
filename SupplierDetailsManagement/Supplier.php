<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['supplier']))
{
    $_SESSION['supplier']=$_SESSION['supplier']+1;
}
else
{
    $_SESSION['supplier']=1;
}
$counter=$_SESSION['supplier'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Supplier_View = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}

?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Supplier Details</title>
	<link rel="stylesheet" type="text/css" href="Supplier.css">
	
</head>
<body style="background-color:transparent;">
	<div class="title">
            <h2 style="text-align: center">SUPPLIER DETAILS</h2>
	</div>
	<table id="suppliertable" style="margin-top: 100px; font-size: 1.5vw">
		<tr>
			<th> Name </th>
			<th> Phone No </th>
			<th> Address </th>
			<th> Work place Name </th>
			<th> Work place address </th>
			<th> Work place phone </th>
			<th> Delete </th>
			<th> Edit </th>
		</tr>

                <?php 
                $showdata = "Select * from supplierdetails";
                $result = mysqli_query($connection, $showdata);
                if (mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                 
                ?>
		<tr>
                <form method="POST" autocomplete="off">
                    <td><?php echo $row["Supplier_name"] ?></td>
                    <td><?php echo $row["Supplier_phoneNo"]?></td>
                    <td><?php echo $row["Supplier_address"]?></td>
                    <td><?php echo $row["Supplier_WPname"]?></td>
                    <td><?php echo $row["Supplier_WPaddress"]?></td>
                    <td><?php echo $row["Supplier_WPphno"]?></td>
                    <td>
                        <button class="delbutton" formaction="ShowDeleteSupplier.php" name="delbtn"
                                value="<?php echo $row["Supplier_id"] ?>">&#10799;
                        </button>
                    </td>
                    <td>
                        <button class="editbutton" formaction="ShowUpdateSupplier.php" name="updbtn"
                                value="<?php echo $row["Supplier_id"] ?>">&#9998;
                        </button>
                    </td>
                </form>
                </tr>
                <?php 
                       
                    }
                }
                mysqli_close($connection);
                ?>
	</table>
        <button class="addbutton" onclick="window.location.href = 'AddSupplier.html';">Add &#43;</button>
</body>
</html>