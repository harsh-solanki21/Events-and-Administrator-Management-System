<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($connection)
{
    //echo "Connection successful in Update file <br><br>";
}
else
{
    //echo "Connection NoT successful in Update file <br><br>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPDATE RESULT</title>
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
        <script src='Exam.js'></script>
    </head>
    <body>
        <?php
        $year = $_GET['year'];
        $class = $_GET['class'];
        //echo "year = $year and student_class = $class<br>";
        
        $e_id=$_GET["updbtn"];
        
        $showdata = "Select * from exam where Exam_id='$e_id'";
        $result = mysqli_query($connection, $showdata);
        if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                    {   
        ?>        
        <div>
            <form method="POST" autocomplete="off">
            <table id="exam">
                <tbody>
                    <tr>
                        <td>Student Name : </td>
                        <td> 
                            <input type="hidden" name="year" value="<?php echo $year?>">
                            <input type="hidden" name="class" value="<?php echo $class?>">
                            <input type="text" name="s_name"value="<?php echo $row["Student_Name"]?>" readonly="readonly"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Marks Obtained : </td>
                        <td> <input type="text" name="marks"
                                    value="<?php echo $row["Marks_Obtained"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Attendance : </td>
                        <td> <input type="text" name="att"
                                    value="<?php echo $row["Att"]?>"/> </td>
                    </tr>
                    <tr id="editbtn">
                        <td colspan="2"class="buttonHolder">
                            <button formaction="Update_Result.php" name="confirmupd"
                                value="<?php echo $e_id ?>">Click to Update
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
        <script>
            function myFunction()
            {
                document.getElementById('editbtn').style.display = "none";
                document.getElementById('exam').style.borderColor = "black";
                var printCon = document.getElementById('exam').innerHTML;
                var oriCon = document.body.innerHTML;
                
                document.body.innerHTML = printCon;
                window.print();
                document.body.innerHTML = oriCon;
            }            
        </script>
    </body>
</html>
