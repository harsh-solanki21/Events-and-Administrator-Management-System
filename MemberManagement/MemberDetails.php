<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

session_start();
if(isset($_SESSION['member_details']))
{
    $_SESSION['member_details']=$_SESSION['member_details']+1;
}
else
{
    $_SESSION['member_details']=1;
}
$counter=$_SESSION['member_details'];
$sesid=$_SESSION['sid'];

$visit_counter = "UPDATE adminsession SET Member_Details = $counter WHERE Session_id = $sesid";
if(mysqli_query($connection, $visit_counter))
{
    //echo "counter updated";
}
else
{
    //echo "counter not updated";
}
?>
<html>
    <head>
        <title>Member Details</title>
        <link rel="stylesheet" type="text/css" href="MemberDetails.css">
        <!-- This below css is for user button which i used in view profile button -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- This below script is for the Search icon -->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        
        <!-- Script for search member-->
        <script>
            function searchFunction()
            {
                var input, filter, sc, btn, i, bt, txtvalue;
                input = document.getElementById("myInput").value;
                filter = input.toLowerCase();
                //alert(filter);
                btn = document.getElementsByClassName("collapsible");
                
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
    <div class="title"><h2 style="text-align: center">MEMBER DETAILS</h2></div>
    
    <div class="mybg">
        <input id="myInput" type="text" name="searchbox" placeholder="Search Church Family" class="searchbox" 
               onInput="searchFunction()" title="Type the Family Head name to search" autocomplete="off"/>
        <button class="addfambutton" onclick="window.location.href = 'AddFamilyDetails.php';">
            Add Family
        </button>
	<button class="delfambutton" onclick="window.location.href = 'ShowDeleteFamily.php';">
            Delete Family
        </button>
    </div>
    
    <?php
    $familydetails = "SELECT * FROM familydetails";
    $churchmemberdetails = "SELECT * FROM church_member";
    
    $result_fam = mysqli_query($connection, $familydetails);
    $result_cm = mysqli_query($connection, $churchmemberdetails);
    if(mysqli_num_rows($result_fam)> 0)
    {
        while ($row_fam = mysqli_fetch_assoc($result_fam))
        {
    ?>
    <div style="margin-top: 0px" id="showcontent">
        <button class="collapsible" value="<?php echo $row_fam["Family_headname"]; ?>">
            <?php echo $row_fam["Family_headname"]; ?>
        </button>
        <div class="content">
            <?php 
            if(mysqli_num_rows($result_cm)>0)
            {
            ?>
            <table border="1" style="text-align: justify">
                <?php
                mysqli_data_seek($result_cm, 0);
                while ($row_cm = mysqli_fetch_assoc($result_cm))
                {
                    if($row_fam["Family_id"] == $row_cm["Family_id"] )
                    {
                ?>
                <tr>
                <form method="POST">
                    <td><?php echo $row_cm["CM_name"]; ?></td>
                    <td><?php echo $row_cm["CM_phoneNo"]; ?></td>
                    <td><?php echo $row_cm["CM_address"]; ?></td>
                    <td><?php echo $row_cm["CM_DateOfBirth"]; ?></td>
                    <td><?php echo $row_cm["CM_Age"]; ?></td>
                    <td><?php echo $row_cm["CM_Gender"]; ?></td>
                    <td>
                        <button class="viewbutton" name="viewdet" formaction="ViewProfile/ViewProfile.php"
                                value="<?php echo $row_cm["CM_id"];?>" >
                            View Profile<i class="glyphicon glyphicon-user"></i>
                        </button>
                    </td>
                </form>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
            <?php
            }
            ?>
            <form method="POST">
                <button class="addmemberbutton" name="addmember" value="<?php echo $row_fam["Family_id"];?>" 
                        formaction="InsertFamilyMember.php">
                    Add Member
            </button>
            </form>
        </div>
        <?php
          }
    }
    mysqli_close($connection);
    ?>
        <script src="MemberDetails.js"></script>
    </div>
</body>
</html>