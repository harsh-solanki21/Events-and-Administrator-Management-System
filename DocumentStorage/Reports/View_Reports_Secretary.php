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
        <title>View Reports</title>
        <link rel="stylesheet" type="text/css" href="../View_Reports_LegalCases.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
    <center>
        <button onclick="window.location.href = 'Reports_Form_Secretary.php'">
            Upload File
        </button>
        
        <button onclick="window.location.href = '../ReportsAndLegalCases.html'">
            Home
        </button>
    </center>
    <br>
    <?php
    $lc_qry = "SELECT Report_id, Report_date, Report_path, Reportmaker_name, Reportmaker_designation FROM reports WHERE Reportmaker_designation = 'Secretary'";
    $result = mysqli_query($connection, $lc_qry);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form method="POST">
                <table style="float: left; margin: 2%;">
                    <tbody>
                        <tr>
                            <td style="font-size: 5vw">
                                <a href="<?php echo $row["Report_path"] ?>">
                                    &#128196;
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Report Maker Name : <?php echo $row["Reportmaker_name"] ?></td>
                        </tr>
                        <tr>
                            <td>Report Maker Designation : <?php echo $row["Reportmaker_designation"] ?></td>
                        </tr>
                        <tr>
                            <td>Date : <?php echo $row["Report_date"] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <button formaction="DeleteReportsSecretary.php" name="DelReports" value="<?php echo $row["Report_id"] ?>">
                                    Delete
                                </button>
                                
                                <a href="<?php echo $row["Report_path"] ?>" download="">
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
