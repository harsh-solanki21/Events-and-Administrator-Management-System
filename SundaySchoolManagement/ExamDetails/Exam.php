<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$year = $_GET['year'];
$student_class = $_GET['student_class'];

//echo "$student_class";
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exam Details</title>
	<link rel="stylesheet" type="text/css" href="Exam.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src='Exam.js'></script>
	
</head>
<body>
	
	<div class="title">
		<h2>CNI ST.JAMES CHURCH</h2>
	</div>
        
        <div id="pri">
	<table id="exam" style="margin-top: 150px" border="1">
		<tr>
			<th> Student Name </th>
			<th> Marks / 100</th>
		        <th> Attendance (in %) </th>
                        <?php
                            $sys_date = date("Y");
                            if($sys_date == $year)
                            {
                        ?>                        
                        <th> Edit </th>
                        <?php 
                            }
                        ?>			
		</tr>

                <?php
                $showdata = "select exam.Exam_id,exam.Student_Name, exam.Marks_Obtained, exam.Att_percentage "
                        . "from exam, student "
                        . "where exam.Student_Name = student.Student_Name AND "
                        . "student.Student_Class='$student_class'";
                $result = mysqli_query($connection, $showdata);
                if (mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                 
                ?>
		<tr>
                <form method="POST" autocomplete="off">
                    
                    <td><?php echo $row["Student_Name"]?></td>
                    <td><?php echo $row["Marks_Obtained"]?></td>
                    <td><?php echo $row["Att_percentage"]?></td>
                    <?php
                        $sys_date = date("Y");
                        if($sys_date == $year)
                        {
                    ?>                    
                    <td>
                        <button class="editbutton" 
                                formaction="Show_Update_Result.php?updbtn=<?php echo $row["Exam_id"] ?>&year=<?php echo $year ?>&class=<?php echo $student_class ?>">
                            &#9998;
                        </button>
                    </td>
                    <?php 
                        }
                    ?>
                </form>
                </tr>
                <?php 
                       
                    }
                }
                mysqli_close($connection);
                ?>
	</table>
        </div>
    
        <!--<button class="addbutton" onclick="window.location.href = 'Add_Result.html';">Add &#43;</button>-->
        
        <button class="addbutton" onclick="myFunction()">Print this page</button>
</body>
</html>