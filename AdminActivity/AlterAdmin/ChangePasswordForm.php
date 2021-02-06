<!DOCTYPE html>
<?php 
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$user_admin = $_GET['user'];
//echo "$user_admin";

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
        <link rel="stylesheet" href="../Admin.css" />
        <script>
            function checkpwd()
            {
                var np = document.getElementById("np").value;
                var cp = document.getElementById("cp").value;
                if(np != cp)
                {
                    alert("Confirm Password didn't match");
                    document.getElementById("cp").style.borderColor = 'red';
                    document.getElementById("submit_button").disabled = true;
                    document.getElementById("cp").focus();                    
                }
            }
        </script>
    </head>
    <body>
        <form method="POST" action="ChangePassword.php?user=<?php echo $user_admin?>" 
              onkeydown="return event.key != 'Enter';">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2"> Change Your Password <?php echo $user_admin?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Enter New Password : </td>
                        <td> 
                            <input type="password" id="np" name="newpassword" /> 
                        </td>
                    </tr>                    
                    <tr>
                        <td>Confirm New Password : </td>
                        <td> 
                            <input type="password" id="cp"name="confnewpassword" onblur="checkpwd()" /> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="buttonHolder">
                            <input type="submit" name="newpwd" id="submit_button"/> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
