<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$year = $_GET['year'];
?>
<html>
    <head>
        <title>Student Details List</title>
        <link rel="stylesheet" type="text/css" href="Student.css">
        <!-- This below css is for user button which i used in view profile button -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- This below script is for the Search icon -->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script>
            function searchFunction()
            {
                
                var input, filter, btn, i, bt;
                input = document.getElementById("myInput").value;
                //alert(input);
                filter = input.toLowerCase();
                //alert(filter);
                btn = document.getElementsByTagName("span");
                for(i=0; btn.length > 0; i++)
                {
                    bt = btn[i].value;
                    
                    //if(bt.includes(filter)) will check it whole name
                    if(bt.startsWith(filter))
                    {
                        btn[i].style.display = "";
                    }
                    else
                    {
                        btn[i].style.display = "none";
                    }
                }
                
            }
        </script>        
    </head>		
    <body>
        <div class="title">
            <h2>CNI ST.JAMES CHURCH</h2>
        </div>

        <div class="mybg">
        <input id="myInput" type="text" name="searchbox" placeholder="Search Student" class="searchbox" 
               onInput="searchFunction()" title="Type the Family Head name to search" autocomplete="off"/>
        </div>
        
        <div style="margin-top: 0px">
            <table>
                <tr>
                    <th> Student Name</th>
                    <th> Student Class </th>
                    <th> Student Year </th>
                    <?php
                        $sys_date = date("Y");
                        if($sys_date == $year)
                        {
                    ?>                    
                    <th> Update </th>
                    <?php 
                        }
                    ?>                    
                </tr>
                <?php
                $showdata = "Select * from student where Student_BatchYear=$year ORDER BY Student_Class";
                $result = mysqli_query($connection, $showdata);
                if (mysqli_num_rows($result) > 0) 
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                ?>
                <tr>
                    <form method="POST" autocomplete="off" 
                      action="Student_Show_Update.php?upbtn=<?php echo $row["Student_id"]; ?>
                      &year=<?php echo $year; ?>&studentname=<?php echo $row["Student_Name"] ?>">
                        
                        <td><span><?php echo $row["Student_Name"] ?></span></td>
                        <td><?php echo $row["Student_Class"] ?></td>
                        <td><?php echo $row["Student_BatchYear"] ?></td>
                        <?php
                            $sys_date = date("Y");
                            if($sys_date == $year)
                            {
                        ?>                        
                        <td>
                            <input type="submit" value="Update" />
                        </td>
                        <?php 
                            }
                        ?>                        
                    </form>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
            <?php
                $sys_date = date("Y");
                if($sys_date == $year)
                    {
            ?>
            <button class="addbutton" 
                        onclick="window.location.href = 'Student_Add_form.php?addbtn=<?php echo $year; ?>';">
                    Add Student Details
            </button>
            <?php 
                    }
            ?>
            </div>
    </body>
</html>
