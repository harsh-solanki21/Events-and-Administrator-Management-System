<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $FPusername = $_POST["FPusername"];
    $FP_email = $_POST["FP_email"];

    $flag = 0;
    $fp = "SELECT Username,Admin_email FROM admin";
    $resultfp = mysqli_query($connection, $fp);
    while(mysqli_num_rows($resultfp) > 0)
    {
        if($rowfp = mysqli_fetch_assoc($resultfp))
        {
            if($rowfp["Username"] == $FPusername && $rowfp["Admin_email"] == $FP_email)
            {
                $flag = 1;
                break;
            }
        }
    }
    
    if($flag==1)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $otp = substr(str_shuffle($permitted_chars), 0, 7);
        header("Location: SendOTP.php?otp=$otp&uname=$FPusername&email=$FP_email");
        //echo "matched";
    }
    
    else
    {
        //alert and go to html page
?>
    <script>
        alert("Wrong username or email");
    </script>
<?php
        header("Location: ForgotPassword.html");
        echo "not matched";
    }
}
