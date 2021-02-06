<!DOCTYPE html>
<?php 
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_GET)
{
    $otp = $_GET['otp'];
    $uname = $_GET['uname'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Enter OTP</title>
        <link rel="stylesheet" href="Dashboard/AdminActivity/Admin.css" />
    </head>
    <body>
        <form method="POST" action="CheckOTP.php" autocomplete="off">
            <table border="1">
                <tbody>
                    <tr>
                        <td>Enter OTP</td>
                        <td>
                            <input type="hidden" name="EmailedOTP" value="<?php echo $otp?>" />
                            <input type="hidden" name="uname" value="<?php echo $uname?>" />
                            <input type="text" name="EnteredOtp" required="required"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="buttonHolder">
                            <input type="submit" name="Check OTP"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
