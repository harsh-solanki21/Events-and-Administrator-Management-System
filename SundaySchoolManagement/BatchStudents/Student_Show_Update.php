<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$id = $_GET['upbtn'];
$year = $_GET['year'];
$studentname = $_GET['studentname'];
$oldname = $studentname;
?>
<html>
    <head>
        <title> UPDATE </title>
        <style>
            input[type="text"],textarea
            {
                width: 100%
            }
            .buttonHolder
            { 
                text-align: center;
            }
            table
            {
                margin-left: 35%;
                margin-top: 5%;
                border: solid lightgray;
                border-radius: 10px;
                padding: 10px;
            }
            td,th
            {
                border: 0px solid #ddd;
            }


            tr:hover
            {
                background-color: slategray;
                color: white;
            }
        </style>
        <script src='Student.js'></script>
    </head>
    <body>
        <div class="form-popup" id="myForm">
            <form method="POST" action="Student_Update.php?student_id=<?php echo $id; ?>&oldname=<?php echo $oldname; ?>"
                  autocomplete="off">
                <table>
                    <tbody>
                        <tr>
                            <td>Student Name : </td>
                            <td> <input type="text" name="s_name" 
                                        required="required" value="<?php echo $studentname; ?>"/> </td>
                        </tr>
                        <tr>
                            <td>Student Class : </td>
                            <td>
                                <select name="s_class" required="required">
                                    <option value="Beginner">Beginner</option>
                                    <option value="Primary">Primary</option>
                                    <option value="Junior">Junior</option>
                                    <option value="Intermediate">Intermediate</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Student Batch Year : </td>
                            <td>
                                <input type="number" name="s_batchYear" readonly="readonly" 
                                       value="<?php echo $year; ?>"/>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"class="buttonHolder">
                                <input type="reset" value="Reset" />
                                <input type="submit" value="Update" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>
