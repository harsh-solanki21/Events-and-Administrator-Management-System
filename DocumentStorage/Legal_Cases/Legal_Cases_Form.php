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
        <title> LEGAL CASES </title>
        <link rel="stylesheet" type="text/css" href="Legal_Cases_Form.css">
    </head>
    <body>
        <div>
            <form method="POST" action="fileupload_legalcases.php" enctype="multipart/form-data" 
                  autocomplete="off" >
            <table>
                <tbody>
                    <tr>
                        <td>Name : </td>
                        <td> 
                            <input type="text" name="DocName" required="required"/>
                        </td>
                    </tr>
                    <tr>
                        <td>File To Upload : </td>
                        <td> <input type="file" name="DocFile" required="required"/> </td>
                    </tr>
                    <tr>
                        <td class="buttonHolder" colspan="2">
                            <input type="submit" value="Enter" />
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
    </body>
</html>
