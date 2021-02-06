<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($connection)
{
    echo "Connected <br>";
}
else
{
    echo "Not Connected <br>";
}

if($_POST)
{
    $DocName = $_POST['DocName'];
    $DocName1 = $_POST['DocName1'];
    $DocFile = "uploads/".basename($_FILES["DocFile"]["name"]);
    $target_dir = "uploads/";
    
    $target_file = $target_dir.basename($_FILES["DocFile"]["name"]);
    $uploadOk = 1;
    $documentFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file))
    {
        echo "Sorry, file already exists. <br>";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($documentFileType != "pdf" && $documentFileType != "docx")
    {
        echo "Sorry, only pdf & docx files are allowed. <br>";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) 
    {
        echo "Sorry, your file was not uploaded. <br>";
    }

    // if everything is ok, try to upload file
    else 
    {
        if (move_uploaded_file($_FILES["DocFile"]["tmp_name"], $target_file))
        {
            echo "The document ". basename( $_FILES["DocFile"]["name"]). " has been uploaded. <br>";
        } 
        else 
        {
            echo "Sorry, there was an error uploading your document. <br>";
        }
    }
    
    $date = date("Y-m-d");
    $insertDoc = "INSERT into reports (Reportmaker_name,Report_date,Report_type,Report_path,Reportmaker_designation)"
        . "VALUES ('$DocName','$date','$documentFileType','$target_file','$DocName1')";
    if(mysqli_query($connection, $insertDoc))
    {
        echo "<script>alert('Reports Uploaded');window.location.href = 'View_Reports_Secretary.php';</script>";
        //header("Location: View_Reports_Secretary.php");
    }
    else
    {
        echo "not inserted";
    }
}