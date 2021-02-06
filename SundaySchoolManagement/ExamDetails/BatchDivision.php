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
//$year = $_GET['year'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sunday School</title>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            .batchdivision1
            {
                background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5));;
                background-repeat: no-repeat;
                background-size: cover;
                height: 100%;
                width: 100%;
                margin-left: 1px;
                text-align: center;
                padding-bottom: 21.5%;
               
                background-color: lightcoral;
               
                    
            }
            
            .batchdivision1:hover
            {
                               
                background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url("q6.jpg");;
                background-repeat: no-repeat;
                background-size: cover;
                height: 100%;
                width: 100%;
                margin-left: 1px;
                text-align: center;
                padding-bottom: 21.5%;
                
                
                
            }
            
            .batchdivision2
            {
                background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5));;
                background-repeat: no-repeat;
                background-size: cover;
                height: 100%;
                width: 100%;
                margin-left: 1px;
                text-align: center;
                padding-bottom: 21.5%;
               
                background-color: lightgray;
            }
            
            .batchdivision2:hover
            {
                               
                background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url("q8.jpg");;
                background-repeat: no-repeat;
                background-size: cover;
                height: 100%;
                width: 100%;
                margin-left: 1px;
                text-align: center;
                padding-bottom: 21.5%;
                
                
                
            }
            
            i
            {
                padding-top: 250px;
                padding-bottom: 10px;
            }
            button
            {
                border: none;
                border-radius: 10px;
                padding: 5px;
            }
            button:hover
            {
                border: none;
                border-radius: 10px;
                padding: 5px;
                background-color: red;
                color: white;
            }
        </style>
    </head>
    <body style="display: flex; flex-direction: row; flex-wrap: nowrap;">
        <div class="batchdivision1">
            
            <i style='font-size:50px' class='fas'>&#xf1ae;</i><br>
            <button onclick="window.location.href = 'Exam.php';">
                Beginners
            </button>
        </div>
        
        <div class="batchdivision2">
            <i style='font-size:50px' class='fas'>&#xf1ae;</i><br>
            <button onclick="window.location.href = 'Exam.php';">
                Primary
            </button>
        </div>
        
        <div class="batchdivision1">
            <i style='font-size:50px' class='fas'>&#xf1ae;</i><br>
            <button onclick="window.location.href = 'Exam.php';">
                Junior
            </button>
        </div>

        <div class="batchdivision2">
            <i style='font-size:50px' class='fas'>&#xf1ae;</i><br>
            <button onclick="window.location.href = 'Exam.php';">
                Intermediate
            </button>
        </div>        
    </body>
</html>
