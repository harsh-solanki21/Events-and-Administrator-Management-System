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
            function checkuname()
            {
                var nu = document.getElementById("nu").value;
                var cu = document.getElementById("cu").value;
                if(nu != cu)
                {
                    alert("Confirm Password didn't match");
                    document.getElementById("cu").style.borderColor = 'red';
                    document.getElementById("submit_button").disabled = true;
                    document.getElementById("cu").focus();                    
                }
            }
        </script>
    </head>
    <body>
        <form method="POST" action="ChangeUsername.php?user=<?php echo $user_admin?>" 
              onkeydown="return event.key != 'Enter';">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2"> Change Your Username <?php echo $user_admin?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Enter New Username : </td>
                        <td> 
                            <input type="text" id="nu" name="newusername" /> 
                        </td>
                    </tr>                    
                    <tr>
                        <td>Confirm New Username : </td>
                        <td> 
                            <input type="text" id="cu"name="confnewusername" onblur="checkuname()" /> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="buttonHolder">
                            <input type="submit" name="newuname" id="submit_button"/> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
