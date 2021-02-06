<?php 
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$year=$_GET["year"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert Expense Details</title>
        <link rel="stylesheet" href="IncomeExpenseShow.css" />
    </head>
    <body>
        <form action="InsertExpense.php?year=<?php echo $year?>" method="POST">
            <table border="1" style="font-size: 2vw">
                <tbody>
                    <tr>
                        <td> Record Description </td>
                        <td> <input type="text" name="record_name" required="required"/> </td>
                    </tr>
                    <tr>
                        <td> Amount </td>
                        <td> <input type="number" name="record_amt" value="" required="required"/> </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="buttonHolder"> 
                            <input type="submit" name="" value="INSERT EXPENSE" /> 
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
