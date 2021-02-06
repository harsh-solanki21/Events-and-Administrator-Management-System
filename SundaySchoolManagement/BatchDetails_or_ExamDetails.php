<!DOCTYPE html>
<?php 
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

/*session_start();
if(isset($_SESSION['sunday_school']))
{
    $_SESSION['sunday_school']=$_SESSION['sunday_school']+1;
}
else
{
    $_SESSION['sunday_school']=1;
}
$counter=$_SESSION['sunday_school'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Sunday_School = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}
*/
$year = $_POST['ss_year'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sunday School</title>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="BatchDetails_or_ExamDetails.css"/>
    </head>
    <body style="display: flex; flex-direction: row; flex-wrap: nowrap;">
        
        <div class="batchstudents">
            <i style='font-size:50px' class='fas'>&#xf1ae;</i><br>
            <button onclick="window.location.href = 'BatchStudents/Student.php?year=<?php echo $year;?>';">
                Student Details
            </button>
        </div>
        
        <div class="selectyear">
            <h3>Showing  Records  of  Year  <?php echo "$year";?></h3>
            <button onclick="window.location.href='SundaySchoolYear.php'">
                Select another year
            </button>
        </div>    
        
        <div class="examdetails">
            <i style='font-size:50px' class='fas'>&#xf51c;</i><br>
            <button onclick="window.location.href = 'ExamDetails/BatchDivision.php?year=<?php echo $year;?>';">
                Exam Details
            </button>
        </div>
        
    </body>
</html>
