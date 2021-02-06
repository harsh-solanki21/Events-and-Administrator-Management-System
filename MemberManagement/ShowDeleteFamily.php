<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$familydetails = "SELECT * FROM familydetails";

$result_fam = mysqli_query($connection, $familydetails);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Show Delete Family</title>
        <link rel="stylesheet" type="text/css" href="MemberForms.css">
    </head>
    <body>
        <?php
        if(mysqli_num_rows($result_fam) > 0)
        {
        ?>
        <form method="POST" action="ShowDeleteFamilyMember.php" 
              style="font-size: 2vw;">
            <table border="1" style="margin-left: 37%; margin-top: 12%">
            <thead>
                <th colspan="2">Select Family to DELETE</th>
            </thead>
        <?php
            while($row_fam = mysqli_fetch_assoc($result_fam))
            {
        ?>
            <tr>
                <td>
                    <input type="radio" name="family" value="<?php echo $row_fam["Family_id"];?>" required="required"/> 
                </td>
                <td>
                    <?php echo $row_fam["Family_headname"];?>
                </td>
            </tr>
        <?php
            }
        ?>
            <tr>
                <td colspan="2" class="buttonHolder">
                    <input type="submit" value="DELETE" /> 
                </td>
            </tr>
        </table>
        </form>
        <?php
        }
        ?>
    </body>
</html>
