<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $delfamily = $_POST["family"];
    
    $delfamilydetails = "SELECT * FROM church_member WHERE Family_id = $delfamily";
    $result = mysqli_query($connection, $delfamilydetails);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DELETE FAMILY MEMBERS</title>
        <link rel="stylesheet" type="text/css" href="MemberForms.css">
    </head>
    <body>
        <?php
        if(mysqli_num_rows($result) > 0)
        {
        ?>
        <form method="POST" style="font-size: 2vw;">
            <table border="1" style="margin-left: 37%; margin-top: 12%; text-align: center">
            <tr>
                <th>Family Members</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td> 
                    <?php echo $row["CM_name"];?> 
                </td>
            </tr>
            <?php 
                }
            ?>
            <tr>
                <td> 
                    <button class="buttonHolder" formaction="DeleteFamily.php" name="famid"
                            value="<?php echo $delfamily; ?>">
                        Confirm Delete
                    </button>
                </td>
            </tr>
        </table>
        </form>
        <?php 
        }
        ?>
    </body>
</html>
<?php
}
?>