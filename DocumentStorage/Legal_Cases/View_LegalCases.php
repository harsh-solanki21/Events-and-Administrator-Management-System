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
        <title>View Legal Cases</title>
        <link rel="stylesheet" type="text/css" href="../View_Reports_LegalCases.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
    <center>
        <button onclick="window.location.href = 'Legal_Cases_Form.php'">
            Upload File
        </button>

        <button onclick="window.location.href = '../ReportsAndLegalCases.html'">
            Home
        </button>
    </center>
    <br>
    <?php
    $lc_qry = "SELECT Doc_id, Doc_name, Doc_date, Doc_path FROM document";
    $result = mysqli_query($connection, $lc_qry);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form method="POST">
                <table style="float: left; margin: 2%;">
                    <tbody>
                        <tr>
                            <td style="font-size: 5vw; text-align:center" colspan="2">
                                <a href="<?php echo $row["Doc_path"] ?>">
                                    &#128196;
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Name : </td>
                            <td><?php echo $row["Doc_name"] ?></td>
                        </tr>
                        <tr>
                            <td>Date : </td>
                            <td><?php echo $row["Doc_date"] ?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center">
                                <button formaction="DeleteDocuments.php" name="DelDoc" value="<?php echo $row["Doc_id"] ?>">
                                    Delete
                                </button>
                            </td>
                            <td>
                                <a href="<?php echo $row["Doc_path"] ?>" download="">
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
