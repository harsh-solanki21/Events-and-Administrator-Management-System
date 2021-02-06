<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $olduname = $_POST["oldusername"];
    $pwd = $_POST["Password"];
    $user_admin = $_GET['user'];
    echo $user_admin;
    
    $flag = 0;
    
    $cu = "SELECT Username, Password, Admin_name FROM admin where Admin_name = '$user_admin'";
    $changeUsername = mysqli_query($connection,$cu);    
    if(mysqli_num_rows($changeUsername) > 0)
    {
        echo "<br><br>in.. if(mysqli_num_rows() > 0) loop...<br><br>";
        
        while($row= mysqli_fetch_assoc($changeUsername))
        {
            echo "<br><br>in.. while(mysqli_fetch_assoc()) loop...<br><br>";
            
            if($olduname == $row["Username"] && $pwd == $row["Password"])
            {
                echo "<br><br> uname pwd match flag = 1 <br><br>";
                $flag=1;
                break;
            }
            else
            {
                echo "<br><br> flag = 0 <br><br>";
                $flag=0;
            }
        }
        if($flag == 1)
        {
            echo "<br><br> flag = 1 change pwd form <br><br>";
            header("Location: ChangeUsernameForm.php?user=$user_admin");
        }
        else
            {
?>

<script>
    alert("Wrong username or password");
</script>

    <?php
            echo "<br><br> flag = 1  display changepwd <br><br>";
            header("Location: DisplayChangeUsername.php?user=$user_admin");
        }
    }
}

