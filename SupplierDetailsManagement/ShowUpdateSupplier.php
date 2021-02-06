<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($connection)
{
    //echo "Connection successful in Update file <br><br>";
}
else
{
    //echo "Connection NoT successful in Update file <br><br>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPDATE SUPPLIER</title>
        <link rel="stylesheet" type="text/css" href="ShowSupplierDetails.css">
    </head>
    <body>
        <?php
        $sid=$_POST["updbtn"];
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
                        <td> <input type="text" name="supplierName"
                                    value="<?php echo $row["Supplier_name"] ?>"/> </td>
                    </tr>
                    <tr>
                        <td>Supplier Phone No : </td>
                        <td> <input type="tel" name="supplierPhone" pattern="[0-9]{10}"
                                    value="<?php echo $row["Supplier_phoneNo"]?>"/> </td>
                    </tr>
                    <tr>
                        <td>Supplier Address : </td>
                        <td> <input type="text" name="supplierAddress"
                                    value="<?php echo $row["Supplier_address"]?>"/> </td>
                    </tr>
                    <tr>
                        <td>Work Place Name : </td>
                        <td> <input type="text" name="wpName"
                                    value="<?php echo $row["Supplier_WPname"]?>"/> </td>
                    </tr>
                    <tr>
                        <td>Work Place Address : </td>
                        <td>
                            <textarea cols="30" rows="4" name="wpAddress"/>
                                <?php echo $row["Supplier_WPaddress"]?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Work Place Phone No : </td>
                        <td> <input type="tel" name="wpPhone" pattern="[0-9]{10}"
                                    value="<?php echo $row["Supplier_WPphno"]?>"/> </td>
                    </tr>
                    <tr>
                        <td colspan="2"class="buttonHolder">
                            <button formaction="UpdateSupplier.php" name="confirmupd"
                                value="<?php echo $sid ?>">Click to Update
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
