<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Certificate</title>
        <link rel="stylesheet" type="text/css" href="View_Certificate.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
    <center>
        <button onclick="window.location.href = 'Certificate.php'">
            Upload File
        </button>        
    </center>
    <br>
    <?php
    $lc_qry = "SELECT DocFormat_id, DocFormat_Name, DocFormat_Date, DocFormat_Storedby, DocFormat_Path "
            . "FROM documentformat";
    $result = mysqli_query($connection, $lc_qry);
    if(mysqli_num_rows($result) > 0) 
    {
        while($row=mysqli_fetch_assoc($result)) 
        {
    ?>
            <form method="POST">
                <table style="float: left; margin: 2%;">
                    <tbody>
                        <tr>
                            <td style="font-size: 5vw; text-align: center" colspan="2">
                                <a href="<?php echo $row["DocFormat_Path"] ?>">
                                    &#128196;
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Certificate Name : </td>
                            <td><?php echo $row["DocFormat_Name"] ?></td>
                        </tr>
                        <tr>
                            <td>Date : </td>
                            <td><?php echo $row["DocFormat_Date"] ?></td>
                        </tr>
                        <tr>
                            <td>File Stored By : </td>
                            <td><?php echo $row["DocFormat_Storedby"] ?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center">
                                <button formaction="DeleteDocuments.php" name="DelDoc" value="<?php echo $row["DocFormat_id"] ?>">
                                    Delete
                                </button>
                            </td>
                            <td>
                                <a href="<?php echo $row["DocFormat_Path"] ?>" download="">
                                    <button type="button">Download <i class='fas fa-download'></i></button>
                                </a>                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <?php
        }
    }
    ?>
</body>
</html>
