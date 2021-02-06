<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
$famid=$_POST["addmember"];

?>
<html>
    <head>
        <title> ADD FAMILY MEMBER </title>
        <link rel="stylesheet" type="text/css" href="MemberForms.css">
    </head>
    <body>
        <div>
            <form method="POST" action="AddFamilyMember.php" enctype="multipart/form-data">
            <table>
                <tbody>
                    <tr>
                        <td>Family Id :  </td>
                        <td>
                            <input type="text" name="FamilyId" value="<?php echo $famid ?>"readonly="readonly"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Member Name : </td>
                        <td>
                            <input type="text" name="memberName" required="required"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Member Address : </td>
                        <td> 
                            <textarea  cols="10" rows="5" name="memberAddress" required="required">
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Member Phone No : </td>
                        <td> <input type="number" name="memberPhno" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Member Birth Date : </td>
                        <td> <input type="date" name="memberDOB" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Member Age : </td>
                        <td> <input type="number" name="memberAge" required="required"/> </td>
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
                        <td> <input type="date" name="memberBaptDate" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Member Confirmation Date : </td>
                        <td> <input type="date" name="memberConfDate" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Member Yearly Donation : </td>
                        <td> <input type="number" name="memberYrDonation"/> </td>
                    </tr>
                    <tr>
                        <td>Member Monthly Donation : </td>
                        <td> <input type="number" name="memberMthDonation" /> </td>
                    </tr>
                    <tr>
                        <td>Member Thanks giving Donation : </td>
                        <td> <input type="number" name="memberTGDonation" /> </td>
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
                        <td> <input type="text" name="memberOccupation" required="required"/> </td>
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
                        <td> <input type="file" name="memberPhoto" accept="image/*" required="required"/> </td>
                    </tr>
                    <tr>
                        <td colspan="2"class="buttonHolder">
                            <input type="reset" value="Reset" />
                            <input type="submit" value="Enter" />
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
    </body>
</html>
