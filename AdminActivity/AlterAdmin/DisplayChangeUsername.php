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
        <title>Change Username</title>
        <link rel="stylesheet" href="../Admin.css" />
    </head>
    <body>
        <form method="POST" action="CheckUsername.php?user=<?php echo $user_admin ?>" autocomplete="off">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2">Hello !! <?php echo $user_admin ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Enter Old Username : </td>
                        <td>
                            <input type="text" name="oldusername" /> 
                        </td>
                    </tr>
                    <tr>
                        <td>Enter Password : </td>
                        <td> <input type="password" name="Password" /> </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="buttonHolder">
                            <input type="submit" name="submit" /> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
