<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$Docformat_id = $_POST['DelDoc'];
echo $Docformat_id;

$del_qry = "SELECT * FROM documentformat WHERE Doc_id = $Docformat_id";
$result = mysqli_query($connection, $del_qry);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Documents</title>
    </head>
    <body>
        <?php
        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                ?>
                <div>
                    <form method="POST">
                        <table>
                            <tbody>
                                <tr>
                                    <td><iframe src="<?php echo $row["Doc_path"] ?>"></iframe></td>
                                </tr>
                                <tr>
                                    <td>Name : <?php echo $row["Doc_name"] ?></td>
                                </tr>
                                <tr>
                                    <td>Date : <?php echo $row["Doc_date"] ?></td>
                                </tr>
                                    <td class="buttonHolder" colspan="2">
                                    <button formaction="DeleteDocs.php" value="<?php echo $row["DocFormat_id"] ?>" name="confirmdel">
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
