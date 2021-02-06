<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($connection)
{
    //echo "Connection successful in Delete file <br><br>";
}
else
{
    //echo "Connection NoT successful in Delete file <br><br>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DELETE SUPPLIER</title>
        <link rel="stylesheet" type="text/css" href="ShowSupplierDetails.css">
    </head>
    <body>
        <?php
        $sid=$_POST["delbtn"];
        $showdata = "Select * from supplierdetails where Supplier_id='$sid'";
        $result = mysqli_query($connection, $showdata);
        if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                    {   
        ?>        
        <div>
            <form method="POST" autocomplete="off">
            <table>
                <tbody>
                    <tr>
                        <td>Supplier Name : </td>
                        <td> <input type="text" name="supplierName" readonly="readonly"
                                    value="<?php echo $row["Supplier_name"] ?>"/> </td>
                    </tr>
                    <tr>
                        <td>Supplier Phone No : </td>
                        <td> <input type="text" name="supplierPhone" readonly="readonly"
                                    value="<?php echo $row["Supplier_phoneNo"]?>"/> </td>
                    </tr>
                    <tr>
                        <td>Supplier Address : </td>
                        <td> <input type="text" name="supplierAddress" readonly="readonly"
                                    value="<?php echo $row["Supplier_address"]?>"/> </td>
                    </tr>
                    <tr>
                        <td>Work Place Name : </td>
                        <td> <input type="text" name="wpName" readonly="readonly"
                                    value="<?php echo $row["Supplier_WPname"]?>"/> </td>
                    </tr>
                    <tr>
                        <td>Work Place Address : </td>
                        <td>
                            <textarea cols="30" rows="4" name="wpAddress" readonly="readonly"/>
                                <?php echo $row["Supplier_WPaddress"]?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Work Place Phone No : </td>
                        <td> <input type="text" name="wpPhone" readonly="readonly"
                                    value="<?php echo $row["Supplier_WPphno"]?>"/> </td>
                    </tr>
                    <tr>
                        <td colspan="2"class="buttonHolder">
                            <button formaction="DeleteSupplier.php" name="confirmdel"
                                value="<?php echo $sid ?>">Click to Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
        <?php
        
           }
        }
        mysqli_close($connection);
        ?>
    </body>
</html>


