<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['add_expense']))
{
    $_SESSION['add_expense']=$_SESSION['add_expense']+1;
}
else
{
    $_SESSION['add_expense']=1;
}
$counter=$_SESSION['add_expense'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Add_Expense = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}

$year = $_GET["year"];
if($_POST)
{
    $record_name = $_POST["record_name"];
    $record_amt = $_POST["record_amt"];
    $record_type = "expense";
    
    $insert_expense_rec = "INSERT INTO incomeexpense (Record_year,Record_type,Record_name,Record_amount)"
            . " VALUES($year,'$record_type','$record_name',$record_amt) ";
    
    if(mysqli_query($connection, $insert_expense_rec))
    {
        echo "<script>alert('Expense Inserted');window.location.href = 'View_IncomeExpense.php?year=$year';</script>";
        //header("Location: View_IncomeExpense.php?year=$year");
    }
    else
    {
        echo "Record Not Inserted";
    }
}