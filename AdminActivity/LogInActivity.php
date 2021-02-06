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
        <meta charset="UTF-8">
        <title>Login Activity</title>
        <link rel="stylesheet" href="LogInActivity.css"/>
        <script type="text/javascript" src="LogInActivity.js"></script>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Admin Name</th>
                    <th>Login date</th>
                    <th>Login time</th>
                    <th>Logout time</th>
                    <th>Member Details</th>
                    <th>Add Family</th>
                    <th>Delete Family</th>
                    <th>Add Member</th>
                    <th>Edit Member</th>
                    <th>Income & Expense</th>
                    <th>Add Income</th>
                    <th>Delete Income</th>
                    <th>Edit Income</th>
                    <th>Add Expense</th>
                    <th>Delete Expense</th>
                    <th>Edit Expense</th>
                    <th>Suppliers</th>
                    <th>Add Supplier</th>
                    <th>Delete Supplier</th>
                    <th>Edit Supplier</th>
                    <th>Sunday School</th>
                    <th>Document Storage</th>
                    <th>Certificate Format</th>
                    <th>Admin Activity</th>
                    <th>Add Admin</th>
                    <th>Delete Admin</th>
                    <th>Change Password</th>
                    <th>Change Username</th>
                </tr>
            </thead>
        <?php
        $login_atc_qry = "SELECT * from adminsession";
        $login_atc_result = mysqli_query($connection, $login_atc_qry);
        if(mysqli_num_rows($login_atc_result) > 0)
        {
            while($row= mysqli_fetch_assoc($login_atc_result))
            {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row["Admin_name"];?></td>
                    <td><?php echo $row["Login_date"];?></td>
                    <td><?php echo $row["Login_time"];?></td>
                    <td><?php echo $row["Logout_time"];?></td>
                    <td><?php echo $row["Member_Details"];?></td>
                    <td><?php echo $row["Add_family"];?></td>
                    <td><?php echo $row["Delete_family"];?></td>
                    <td><?php echo $row["Add_member"];?></td>
                    <td><?php echo $row["Edit_member"];?></td>
                    <td><?php echo $row["Income_Expense"];?></td>
                    <td><?php echo $row["Add_Income"];?></td>
                    <td><?php echo $row["Delete_Income"];?></td>
                    <td><?php echo $row["Edit_Income"];?></td>
                    <td><?php echo $row["Add_Expense"];?></td>
                    <td><?php echo $row["Delete_Expense"];?></td>
                    <td><?php echo $row["Edit_Expense"];?></td>
                    <td><?php echo $row["Supplier_View"];?></td>
                    <td><?php echo $row["Add_Supplier"];?></td>
                    <td><?php echo $row["Delete_Supplier"];?></td>
                    <td><?php echo $row["Edit_Supplier"];?></td>
                    <td><?php echo $row["Sunday_School"];?></td>
                    <td><?php echo $row["Document_Storage"];?></td>
                    <td><?php echo $row["Certificate_Format"];?></td>
                    <td><?php echo $row["Admin_activity"];?></td>
                    <td><?php echo $row["Add_Admin"];?></td>
                    <td><?php echo $row["Delete_Admin"];?></td>
                    <td><?php echo $row["Change_Password"];?></td>
                    <td><?php echo $row["Change_Username"];?></td>
                </tr>
            </tbody>        
        <?php
            }
        }
        ?>
        </table>
    </body>
</html>
