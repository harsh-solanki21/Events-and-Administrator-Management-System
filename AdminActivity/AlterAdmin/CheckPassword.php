<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $uname = $_POST["username"];
    $oldpwd = $_POST["oldPassword"];
    $user_admin = $_GET['user'];
    echo $user_admin;
    
    $flag = 0;
    
    $cp = "SELECT Username, Password, Admin_name FROM admin where Admin_name = '$user_admin'";
    $changePassword = mysqli_query($connection,$cp);    
    if(mysqli_num_rows($changePassword) > 0)
    {
        
        while($row= mysqli_fetch_assoc($changePassword))
        {
            if($uname == $row["Username"] && $oldpwd == $row["Password"])
            {
                $flag=1;
                break;
            }
            else
            {
                $flag=0;
            }
        }
        if($flag == 1)
        {
            header("Location: ChangePasswordForm.php?user=$user_admin");
        }
        else
            {
?>

<script>
    alert("Wrong username or password");
</script>

    <?php
            header("Location: DisplayChangePassword.php?user=$user_admin");
        }
    }
}

