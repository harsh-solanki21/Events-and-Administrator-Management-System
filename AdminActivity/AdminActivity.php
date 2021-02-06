<!DOCTYPE html>
<?php 
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['admin_activity']))
{
    $_SESSION['admin_activity']=$_SESSION['admin_activity']+1;
}
else
{
    $_SESSION['admin_activity']=1;
}
$counter=$_SESSION['admin_activity'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Admin_activity = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}

$user_admin = $_GET['user'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Activity</title>
        <script type="text/javascript" src="AdminActivity.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="AdminActivity.css"/>
    </head>
    <body style="display: flex; flex-direction: row; flex-wrap: nowrap;">
        <div class="addadmin">
            <i style='font-size:50px' class='fas'>&#xf234;</i><br>
            <button onclick="window.location.href = 'RegisterAdmin/RegisterAdminForm.html';">
                Add Admin
            </button>
        </div>
        
        <div class="deladmin">
            <i style='font-size:50px' class='fas'>&#xf503;</i><br>
            <button 
                onclick="window.location.href = 
                            'DeleteAdmin/DisplayAdminForDelete.php?user=<?php echo $user_admin; ?>'">
                Delete Admin
            </button>
        </div>
        
        <div class="alteradmin">
            <i style='font-size:50px' class='fas'>&#xf4ff;</i><br>    
            <div class="dropdown" style="position: relative; margin:0px 173px 0px">
                <button class="dropdown-toggle" type="button" 
                        id="dropdownMenuButton" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                    Alter Admin
                    <span class="caret"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" 
                           href="AlterAdmin/DisplayChangePassword.php?user=<?php echo $user_admin; ?>">
                            Change Password
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" 
                           href="AlterAdmin/DisplayChangeUsername.php?user=<?php echo $user_admin; ?>">
                            Change Username
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </body>
</html>
