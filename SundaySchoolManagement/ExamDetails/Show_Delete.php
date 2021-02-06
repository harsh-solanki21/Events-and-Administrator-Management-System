<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($connection)
{
    //echo "Connection successful in Delete file <br><br>";
}
else
{
    //echo "Connection NoT successful in Delete file <br><br>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DELETE RESULT</title>
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
            tr:nth-child(even)
            {
                background-color: lightgray;
            }
            tr:hover
            {
                background-color: slategray;
                color: white;
            }
        </style>
    </head>
    <body>
        <?php
        
        $e_id=$_POST["delbtn"];
        
        $showdata = "Select * from exam where Exam_id='$e_id'";
        
        $result = mysqli_query($connection, $showdata);
        
        if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                    {   
        ?>        
        <div>
            <form method="POST" autocomplete="off">
            <table>
                <tbody>
                    <tr>
                        <td>Student Name : </td>
                        <td> <input type="text" name="s_name" readonly="readonly"
                                    value="<?php echo $row["Student_Name"]?>"/> </td>
                    </tr>
                    <tr>
                        <td>Marks Obtained : </td>
                        <td> <input type="text" name="marks" readonly="readonly"
                                    value="<?php echo $row["Marks_Obtained"]?>"/> </td>
                    </tr>
                    
                    <tr>
                        <td>Attendance : </td>
                        <td> <input type="text" name="att" readonly="readonly"
                                    value="<?php echo $row["Att"]?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="buttonHolder">
                            <button formaction="Delete_Result.php" name="confirmdel"
                                value="<?php echo $e_id ?>">Click to Delete
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
        mysqli_close($connection);
        ?>
    </body>
</html>


