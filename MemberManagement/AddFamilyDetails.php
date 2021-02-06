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
        <title> ADD FAMILY </title>
        <link rel="stylesheet" type="text/css" href="MemberForms.css">
    </head>
    <body>
        <div>
            <form method="POST" action="AddFamily.php" enctype="multipart/form-data">
            <table>
                <tbody>
                    <tr>
                        <td>Family Head Name : </td>
                        <td> 
                            <input type="text" name="familyHeadName" required="required"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Family Head Address : </td>
                        <td> 
                            <textarea  cols="10" rows="5" name="familyHeadAddress" required="required">
                            </textarea> 
                        </td>
                    </tr>
                    <tr>
                        <td>Family Head Phone No : </td>
                        <td> <input type="number" name="familyHeadPhno" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Family Head Birth Date : </td>
                        <td> <input type="date" name="familyHeadDOB" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Family Head Age : </td>
                        <td> <input type="number" name="familyHeadAge" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Family Head Gender : </td>
                        <td> 
                            <input type="radio" name="familyHeadGender" value="Male" 
                                   required="required" checked="checked"/> 
                            Male 
                            <input type="radio" name="familyHeadGender" value="Female" required="required"/> 
                            Female
                        </td>
                    </tr>
                    <tr>
                        <td>Family Head Baptism Date : </td>
                        <td> <input type="date" name="familyHeadBaptDate" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Family Head Confirmation Date : </td>
                        <td> <input type="date" name="familyHeadConfDate" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Family Head Yearly Donation : </td>
                        <td> <input type="number" name="familyHeadYrDonation" /> </td>
                    </tr>
                    <tr>
                        <td>Family Head Monthly Donation : </td>
                        <td> <input type="number" name="familyHeadMthDonation" /> </td>
                    </tr>
                    <tr>
                        <td>Family Head Thanks giving Donation : </td>
                        <td> <input type="number" name="familyHeadTGDonation" /> </td>
                    </tr>
                    <tr>
                        <td>Family Head Marital Status : </td>
                        <td> 
                            <input type="radio" name="familyHeadMaritalstatus" value="married" required="required"/>
                            Married  
                            <input type="radio" name="familyHeadMaritalstatus" value="unmarried" required="required"/>
                            Unmarried
                        </td>
                    </tr>
                    <tr>
                        <td>Family Head Occupation : </td>
                        <td> <input type="text" name="familyHeadOccupation" required="required"/> </td>
                    </tr>
                    <tr>
                        <td>Family Head Role in Church : </td>
                        <td> 
                            <input type="radio" name="familyHeadChurchrole" value="Pastor" required="required"/>
                            Pastor
                            <input type="radio" name="familyHeadChurchrole" value="Treasurer" required="required"/> 
                            Treasurer
                            <input type="radio" name="familyHeadChurchrole" value="Secretary" required="required"/> 
                            Secretary
                            <input type="radio" name="familyHeadChurchrole" value="Member" required="required" checked="checked"/> 
                            Member
                        </td>
                    </tr>
                    <tr>
                        <td>Family Head Photo : </td>
                        <td> <input type="file" name="familyHeadPhoto" accept="image/*" required="required"/> </td>
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
