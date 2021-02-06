<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$Report_id = $_POST['DelReports'];
echo $Report_id;

$del_qry = "SELECT * FROM reports WHERE Report_id = '$Report_id'";
$result = mysqli_query($connection, $del_qry);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Reports</title>
    </head>
    <body>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div>
                    <form method="POST">
                        <table>
                            <tbody>
                                <tr>
                                    <td><iframe src="<?php echo $row["Report_path"] ?>"></iframe></td>
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
                            <td class="buttonHolder" colspan="2">
                                <button formaction="DelRepSecretary.php" value="<?php echo $row["Report_id"] ?>" name="confirmdel">
                                    Confirm Delete
                                </button>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
        <?php
    }
}
?>
    </body>
</html>
