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
    $DocFormatName = $_POST['DocFormatName'];
    $DocFormatStoredby = $_POST['DocFormatStoredby'];
    $DocFile = "certidocs/" .basename($_FILES["DocType"]["name"]);
    $target_dir = "certidocs/";
    
    $target_file = $target_dir.basename($_FILES["DocType"]["name"]);
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
        if (move_uploaded_file($_FILES["DocType"]["tmp_name"], $target_file))
        {
            echo "The document ". basename( $_FILES["DocType"]["name"]). " has been uploaded. <br>";
        } 
        else 
        {
            echo "Sorry, there was an error uploading your document. <br>";
        }
    }
    
    $date = date("Y-m-d");
    $insertDoc = "INSERT into documentformat (DocFormat_type,DocFormat_Name,DocFormat_Storedby, "
            . "DocFormat_Path,DocFormat_Date)"
        . "VALUES ('$documentFileType','$DocFormatName','$DocFormatStoredby','$target_file','$date')";
    if(mysqli_query($connection, $insertDoc))
    {
        echo "<script>alert('Certificate Uploaded');window.location.href = 'UsernameUpdated.html';</script>";
        header("Location: View_Certificate.php");
    }
    else
    {
        echo "not inserted";
    }
}