<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['update_expense']))
{
    $_SESSION['update_expense']=$_SESSION['update_expense']+1;
}
else
{
    $_SESSION['update_expense']=1;
}
$counter=$_SESSION['update_expense'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Edit_Expense = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}

$rec_id=$_POST["confirmupd"];
$year=$_GET["year"];

if($_POST)
{
    $record_name = strtolower($_POST['record_name']);
    $record_amt = $_POST['record_amt'];
    
    echo "$record_name<br>";
    echo "$record_amt<br>";
    
    
    $update_income = "UPDATE incomeexpense SET Record_name = '$record_name',Record_amount = $record_amt"
            . " WHERE Record_id = $rec_id";
    if(mysqli_query($connection, $update_income))
    {
        echo "<script>alert('Expense Updated');window.location.href = 'View_IncomeExpense.php?year=$year';</script>";
        //header("Location: View_IncomeExpense.php?year=$year");
    }
    else
    {
        echo "Record Not Updated <br><br>". mysqli_error($connection);
    }
    
    mysqli_close($connection);
}