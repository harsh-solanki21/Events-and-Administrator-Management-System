<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['edit_member']))
{
    $_SESSION['edit_member']=$_SESSION['edit_member']+1;
}
else
{
    $_SESSION['edit_member']=1;
}
$counter=$_SESSION['edit_member'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Edit_member = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}


//Checking Connection
if(!$connection)
{
    die("Connection Failed <br><br>");
}
else
{
   echo "Connection Successfull <br><br>";
}

if($_POST)
{
    $member_id = $_POST["update_id"];
    
    $memberName= strtolower($_POST["memberName"]);
    $memberAddress = trim(strtolower($_POST["memberAddress"]));
    $memberPhno = $_POST["memberPhno"];
    $memberDOB = $_POST["memberDOB"];
    $memberAge = $_POST["memberAge"];
    $memberGender = strtolower($_POST["memberGender"]);
    $memberBaptDate = $_POST["memberBaptDate"];
    $memberConfDate = $_POST["memberConfDate"];
    $memberYrDonation = $_POST["memberYrDonation"];
    $memberMthDonation = $_POST["memberMthDonation"];
    $memberTGDonation = $_POST["memberTGDonation"];
    $memberMaritalstatus = strtolower($_POST["memberMaritalstatus"]);
    $memberOccupation = strtolower($_POST["memberOccupation"]);
    $memberChurchrole = strtolower($_POST["memberChurchrole"]);
    $memberPhoto = "MemberImages/".basename($_FILES["memberPhoto"]["name"]);
    
    //Code for Uploading member photo starts
    $target_dir = "ViewProfile/MemberImages/";
    $target_file = $target_dir.basename($_FILES["memberPhoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    //Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["memberPhoto"]["tmp_name"]);
    if($check != false)
    {
        echo "File is an image - ".$check["mime"].".<br>";
        $uploadOk = 1;
    }
    else
    {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
    
    //Check if file already exists
    if(file_exists($target_file))
    {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    
    //Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "JPG" 
            && $imageFileType != "png" && $imageFileType != "PNG"
            && $imageFileType != "jpeg" && $imageFileType != "JPEG")
    {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.<br>";
        $uploadOk = 0;
    }
    
    //Check if $uploadOk is set to 0 by an error
    if($uploadOk == 0)
    {
        echo "Sorry, your file was not uploaded. <br>";
        //if everything is ok, try to upload file
    }
    else
    {
        if(move_uploaded_file($_FILES["memberPhoto"]["tmp_name"],$target_file))
        {
            echo "The File ".basename($_FILES["memberPhoto"]["name"])."has been uploaded<br>";
        }
        else
        {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
    //Code for Uploading member photo ends
    
    $updateMember = "UPDATE church_member SET "
            . "CM_name = '$memberName',CM_address = '$memberAddress',CM_phoneNo = '$memberPhno',"
            . "CM_photo = '$memberPhoto',CM_DateOfBirth = '$memberDOB',CM_Age = $memberAge,"
            . "CM_Gender = '$memberGender',CM_BaptismDate = '$memberBaptDate',"
            . "CM_ConfirmationDate = '$memberConfDate',CM_YearlyDonation = $memberYrDonation,"
            . "CM_MonthlyDonation = $memberMthDonation,CM_ThanksGivingDoantion = $memberTGDonation,"
            . "CM_MaritalStatus = '$memberMaritalstatus',CM_Occupation = '$memberOccupation',"
            . "CM_RoleInchurch = '$memberChurchrole' WHERE CM_id = $member_id";
    
    if(mysqli_query($connection, $updateMember))
    {
        echo "<script>alert('Family Member Updated');window.location.href = 'MemberDetails.php';</script>";
        header("Location: MemberDetails.php");
    }
    else
    {
        echo "Member Details Not Updated";
    }
    
}