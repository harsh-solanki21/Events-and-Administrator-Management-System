<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['add_family']))
{
    $_SESSION['add_family']=$_SESSION['add_family']+1;
}
else
{
    $_SESSION['add_family']=1;
}
$counter=$_SESSION['add_family'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Add_family = $counter WHERE Session_id = $sesid";
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
    $familyHeadName= strtolower($_POST["familyHeadName"]);
    $familyHeadAddress = trim(strtolower($_POST["familyHeadAddress"]));
    $familyHeadPhno = $_POST["familyHeadPhno"];
    $familyHeadDOB = $_POST["familyHeadDOB"];
    $familyHeadAge = $_POST["familyHeadAge"];
    $familyHeadGender = strtolower($_POST["familyHeadGender"]);
    $familyHeadBaptDate = $_POST["familyHeadBaptDate"];
    $familyHeadConfDate = $_POST["familyHeadConfDate"];
    $familyHeadYrDonation = $_POST["familyHeadYrDonation"];
    $familyHeadMthDonation = $_POST["familyHeadMthDonation"];
    $familyHeadTGDonation = $_POST["familyHeadTGDonation"];
    $familyHeadMaritalstatus = strtolower($_POST["familyHeadMaritalstatus"]);
    $familyHeadOccupation = strtolower($_POST["familyHeadOccupation"]);
    $familyHeadChurchrole = strtolower($_POST["familyHeadChurchrole"]);
    $familyHeadPhoto = "MemberImages/".basename($_FILES["familyHeadPhoto"]["name"]);
    
    //Code for Uploading member photo starts    
    $target_dir = "ViewProfile/MemberImages/";
    $target_file = $target_dir.basename($_FILES["familyHeadPhoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    //Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["familyHeadPhoto"]["tmp_name"]);
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
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
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
        if(move_uploaded_file($_FILES["familyHeadPhoto"]["tmp_name"],$target_file))
        {
            echo "The File ".basename($_FILES["familyHeadPhoto"]["name"])."has been uploaded<br>";
        }
        else
        {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
    //Code for Uploading member photo ends
    
    
    $insertFamily = "INSERT INTO familydetails (Family_headname) VALUES ('$familyHeadName')";
    if(mysqli_query($connection, $insertFamily))
    {
        echo "Family Inserted  <br>";
    }
    else
    {
        echo "Family Not Inserted  <br>";
    }
    
    $getfamilyId = "SELECT Family_id FROM familydetails WHERE Family_headname = '$familyHeadName'";
    $result = mysqli_query($connection, $getfamilyId);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $familyId = $row["Family_id"];
        }
    }
    
    
    $insertMember = "INSERT INTO church_member "
            . "(Family_id,CM_name,CM_address,CM_phoneNo,CM_photo,CM_DateOfBirth,CM_Age,CM_Gender,CM_BaptismDate,"
            . "CM_ConfirmationDate,CM_YearlyDonation,CM_MonthlyDonation,CM_ThanksGivingDoantion,"
            . "CM_MaritalStatus,CM_Occupation,CM_RoleInchurch)"
            . "VALUES ($familyId,'$familyHeadName','$familyHeadAddress','$familyHeadPhno','$familyHeadPhoto',"
            . "'$familyHeadDOB',$familyHeadAge,'$familyHeadGender','$familyHeadBaptDate',"
            . "'$familyHeadConfDate',$familyHeadYrDonation,$familyHeadMthDonation,$familyHeadTGDonation,"
            . "'$familyHeadMaritalstatus','$familyHeadOccupation','$familyHeadChurchrole')";    
    if(mysqli_query($connection, $insertMember))
    {
        echo "<script>alert('Family Added');window.location.href = 'MemberDetails.php';</script>";
        //header("Location: MemberDetails.php");
    }
    else
    {
        echo " Church Member Not Inserted <br>";
    }
    
}
