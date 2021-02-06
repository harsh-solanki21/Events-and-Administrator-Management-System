<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['income_expense_view']))
{
    $_SESSION['income_expense_view']=$_SESSION['income_expense_view']+1;
}
else
{
    $_SESSION['income_expense_view']=1;
}
$counter=$_SESSION['income_expense_view'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Income_Expense = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}


if($_POST)
{
    $ie_year = $_POST["ie_year"];
}
else
{
    $ie_year = $_GET["year"];
}

$view_income_records = "SELECT * FROM incomeexpense WHERE Record_year = $ie_year and Record_type='income'";
$result_income = mysqli_query($connection, $view_income_records);

$view_expense_records = "SELECT * FROM incomeexpense WHERE Record_year = $ie_year and Record_type='expense'";
$result_expense = mysqli_query($connection, $view_expense_records);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Income And Expense</title>
        <link rel="stylesheet" href="IncomeExpense.css" />
    </head>
    <body style="text-align: center;">
        <h3>Showing Records of Year <u><?php echo "$ie_year";?></u></h3>
        <button onclick="window.location.href='SelectYear.html'">
            Select another year 
        </button>
        
        <br><br>
        <?php
        $sys_date = date("Y");
        if($sys_date == $ie_year)
        {
        ?>
        <button onclick="window.location.href='InsertIncomeForm.php?year=<?php echo $ie_year ?>'">
            + Add Income 
        </button>
        
        <button onclick="window.location.href='InsertExpenseForm.php?year=<?php echo $ie_year ?>'"
                style="margin-left: 2%"> 
            + Add Expense 
        </button>
        <?php
        }
        ?>        
        <br><br>
        <div class="aParent"> 
<!--Income table starts -->              
            <div>
                    <form method="POST" autocomplete="off">
                        <table border="1" style="font-size: 2vw">
                            <thead>
                                <tr>
                                    <th> Sr.No </th>
                                    <th> Income Record </th>
                                    <th> Amount </th>
                                    <?php
                                    if($sys_date == $ie_year)
                                    {
                                    ?>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                    <?php 
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $srno=0;
                                $total_inc = 0;
                                if(mysqli_num_rows($result_income) > 0)
                                {
                                    while($row_inc=mysqli_fetch_assoc($result_income))
                                    {
                                        $srno++;
                               ?>
                                <tr>
                                    <td><?php echo $srno;?></td>
                                    <td><?php echo $row_inc["Record_name"];?></td>
                                    <td><?php echo $row_inc["Record_amount"];?></td>
                                    <?php
                                    if($sys_date == $ie_year)
                                    {
                                    ?>    
                                    <td>
                                        <button formaction="ShowUpdateIncome.php" name="updbtn"
                                                style="width: 100%"
                                                value="<?php echo $row_inc["Record_id"] ?>">&#9998;
                                        </button>
                                    </td>
                                    <td>
                                        <button formaction="ShowDeleteIncome.php" name="delbtn"
                                                style="width: 100%"
                                                value="<?php echo $row_inc["Record_id"] ?>">&#10799;
                                        </button>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                    <?php
                                    $total_inc += $row_inc["Record_amount"];
                                    }
                                }
                                    ?>
                                <tr>
                                    <td colspan="2" style="text-align: center"> Total Income </td>
                                    <td colspan="3"><?php echo $total_inc;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
            </div>
<!--Income table completes -->

<!--Expense table starts -->              
            <div style="margin-left: 2%; font-size: 2vw">   
                    <form method="POST" autocomplete="off">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th> Sr.No </th>
                                    <th> Expense Record </th>
                                    <th> Amount </th>
                                    <?php
                                    if($sys_date == $ie_year)
                                    {
                                    ?>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                    <?php 
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $srno=0;
                                $total_exp = 0;
                                if(mysqli_num_rows($result_expense) > 0)
                                {
                                    while($row_exp=mysqli_fetch_assoc($result_expense))
                                    {
                                        $srno++;
                                ?>
                                <tr>
                                    <td><?php echo $srno;?></td>
                                    <td><?php echo $row_exp["Record_name"];?></td>
                                    <td><?php echo $row_exp["Record_amount"];?></td>
                                    <?php
                                    if($sys_date == $ie_year)
                                    {
                                    ?>
                                    <td>
                                        <button formaction="ShowUpdateExpense.php" name="updbtn"
                                                value="<?php echo $row_exp["Record_id"] ?>"
                                                style="width: 100%">&#9998;
                                        </button>
                                    </td>
                                    <td>
                                        <button formaction="ShowDeleteExpense.php" name="delbtn"
                                                value="<?php echo $row_exp["Record_id"] ?>"
                                                style="width: 100%">&#10799;
                                        </button>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                    <?php
                                    $total_exp += $row_exp["Record_amount"];
                                    }
                                }
                                    ?>
                                <tr>
                                    <td colspan="2" style="text-align: center"> Total Expense </td>
                                    <td colspan="3"><?php echo $total_exp;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
            </div>
<!--Expense table completes -->              
        </div>
    </body>
</html>
