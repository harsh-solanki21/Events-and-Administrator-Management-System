<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['delete_income']))
{
    $_SESSION['delete_income']=$_SESSION['delete_income']+1;
}
else
{
    $_SESSION['delete_income']=1;
}
$counter=$_SESSION['delete_income'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Delete_Income = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}

$rec_id=$_POST["confirmdel"];
$year=$_GET["year"];

if($_POST)
{
    $delete_income = "DELETE FROM incomeexpense WHERE Record_id = $rec_id";
    if(mysqli_query($connection, $delete_income))
    {
        echo "<script>alert('Income Deleted');window.location.href = 'View_IncomeExpense.php?year=$year';</script>";
        //header("Location: View_IncomeExpense.php?year=$year");
    }
    else
    {
        echo "Record Not Deleted <br><br>". mysqli_error($connection);
    }
    
    mysqli_close($connection);
}