<!DOCTYPE html>
<?php 
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$user_admin = $_GET["user"];
//echo $user_admin;

$displayadmins = "SELECT * FROM admin WHERE Admin_name != '$user_admin'";

$result_admin = mysqli_query($connection, $displayadmins);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Display Admins for Delete</title>
        <link rel="stylesheet" href="../Admin.css" />
    </head>
    <body>
        <?php
        if(mysqli_num_rows($result_admin) > 0)
        {
        ?>
        <form method="POST" action="DeleteAdmin.php">
            <table border="1">
                    <tbody>
                        <?php
                                while ($row = mysqli_fetch_assoc($result_admin))
                                {
                        ?>
                        <tr>
                            <td>
                                <input type="radio" name="admin" value="<?php echo $row["Admin_id"]; ?>" />
                            </td>
                            <td>
                                <?php echo $row["Admin_name"];?>
                            </td>
                        </tr>
                        <?php 
                                }
                        ?>
                        <tr>
                            <td colspan="2" class="buttonHolder">
                                <input type="submit" value="DELETE ADMIN"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </form>
        <?php
        }
        ?>
    </body>
</html>
