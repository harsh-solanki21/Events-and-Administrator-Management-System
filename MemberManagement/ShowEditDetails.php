<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$cm_id = $_POST["Editid"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EDIT DETAILS</title>
        <link rel="stylesheet" type="text/css" href="MemberForms.css">
        <script>
            function chngName()
            {
                document.getElementById("lb").style.display = "none";
                document.getElementById("inp").style.color = "";
            }
        </script>
    </head>
    <body>
        <?php
        $churchmemberdetails = "SELECT * FROM church_member where CM_id = $cm_id";
        $result = mysqli_query($connection, $churchmemberdetails);
        if(mysqli_num_rows($result)> 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
        ?>
        <div>
            <form method="POST" action="EditDetails.php" enctype="multipart/form-data">
            <table>
                <tbody>
                    <tr>
                        <td>Member Name : </td>
                        <td>
                            <input type="text" name="memberName" required="required"
                                   value="<?php echo $row["CM_name"]; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Member Address : </td>
                        <td> 
                            <textarea  cols="10" rows="5" name="memberAddress" required="required">
                                <?php echo $row["CM_address"]; ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Member Phone No : </td>
                        <td> 
                            <input type="number" name="memberPhno" required="required"
                                    value="<?php echo $row["CM_phoneNo"]; ?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Member Birth Date : </td>
                        <td> 
                            <input type="date" name="memberDOB" required="required"
                                   value="<?php echo $row["CM_DateOfBirth"]; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Member Age : </td>
                        <td> 
                            <input type="number" name="memberAge" required="required"
                                   value="<?php echo $row["CM_Age"]; ?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Member Gender : </td>
                        <td> 
                            <input type="radio" name="memberGender" value="Male" required="required"/>
                            Male 
                            <input type="radio" name="memberGender" value="Female" required="required"/> 
                            Female
                        </td>
                    </tr>
                    <tr>
                        <td>Member Baptism Date : </td>
                        <td> 
                            <input type="date" name="memberBaptDate" required="required"
                                   value="<?php echo $row["CM_BaptismDate"]; ?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Member Confirmation Date : </td>
                        <td> 
                            <input type="date" name="memberConfDate" required="required"
                                   value="<?php echo $row["CM_ConfirmationDate"]; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Member Yearly Donation : </td>
                        <td> 
                            <input type="number" name="memberYrDonation" 
                                   value="<?php echo $row["CM_YearlyDonation"]; ?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Member Monthly Donation : </td>
                        <td> 
                            <input type="number" name="memberMthDonation" 
                                    value="<?php echo $row["CM_MonthlyDonation"]; ?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Member Thanks giving Donation : </td>
                        <td> 
                            <input type="number" name="memberTGDonation" 
                                   value="<?php echo $row["CM_ThanksGivingDoantion"]; ?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Member Marital Status : </td>
                        <td> 
                            <input type="radio" name="memberMaritalstatus" value="married" required="required"/>
                            Married  
                            <input type="radio" name="memberMaritalstatus" value="unmarried" required="required"/>
                            Unmarried
                        </td>
                    </tr>
                    <tr>
                        <td>Member Occupation : </td>
                        <td> 
                            <input type="text" name="memberOccupation" required="required" 
                                   value="<?php echo $row["CM_Occupation"]; ?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td>Member Role in Church : </td>
                        <td>
                            <input type="radio" name="memberChurchrole" value="Pastor" required="required"/>
                            Pastor
                            <input type="radio" name="memberChurchrole" value="Treasurer" required="required"/> 
                            Treasurer
                            <input type="radio" name="memberChurchrole" value="Secretary" required="required"/> 
                            Secretary
                            <input type="radio" name="memberChurchrole" value="Member" required="required" checked="checked"/> 
                            Member
                        </td>
                    </tr>
                    <tr>
                        <td>Member Photo : </td>
                        <td> 
                            <label id="lb">
                                <?php echo str_replace("MemberImages/", "",$row["CM_photo"]); ?>
                            </label>
                            <input id="inp" type="file" name="memberPhoto" accept="image/*" required="required"
                                   onchange="chngName()" style="color: transparent"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="buttonHolder">
                            <button name="update_id" value="<?php echo $cm_id; ?>">
                                Update
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
