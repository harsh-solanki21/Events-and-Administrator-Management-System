<?php 
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Income Details</title>
        <link rel="stylesheet" href="IncomeExpenseShow.css" />
    </head>
    <body>
        <?php
        $rec_id=$_POST["delbtn"];
        $showdata = "Select * from incomeexpense where Record_id='$rec_id'";
        $result = mysqli_query($connection, $showdata);
        if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                    {   
        ?>        
        <form action="" method="POST">
            <table border="1" style="font-size: 2vw">
                <tbody>
                    <tr>
                        <td> Record Description </td>
                        <td> 
                            <input type="text" name="record_name" readonly="readonly"
                                   value="<?php echo $row["Record_name"]?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td> Amount </td>
                        <td> 
                            <input type="number" name="record_amt" readonly="readonly"
                                   value="<?php echo $row["Record_amount"]?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="buttonHolder"> 
                            <button formaction="DeleteIncome.php?year=<?php echo $row["Record_year"]?>" 
                                    name="confirmdel"
                                value="<?php echo $rec_id ?>">Click to Delete
                            </button> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php
        
           }
        }
        mysqli_close($connection);
        ?>        
    </body>
</html>
