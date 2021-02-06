<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

//Checking Connection
if(!$connection)
{
    die("Connection Failed");
}
else
{
   //echo "Connection Successfull";
}

if($_POST)
{ 
    $form_uname = $_POST['uname'];
    $form_pswd = $_POST['psw'];
    
    $sql="SELECT Username, Password, Admin_name from admin";
    $result= mysqli_query($connection, $sql);
    
    if(mysqli_num_rows($result) > 0)
    {
        while ($row=mysqli_fetch_assoc($result))
        {
            $username_table=$row['Username'];
            $password_table=$row['Password'];
            $name_table=$row['Admin_name'];
            
            if($form_uname==$username_table && $form_pswd==$password_table)
            {
                session_start();
                $session_status = 0;
                $login_date = date("Y-m-d");
                
                date_default_timezone_set("Asia/Kolkata");
                $login_time = date("G:i:s");
                
                $session_initial = "INSERT INTO adminsession (Admin_name,Login_date,Login_time,"
                        . "Member_details,Add_family,Delete_family,Add_member,Edit_member,"
                        . "Income_Expense,Add_Income,Delete_Income,Edit_Income,Add_Expense,Delete_Expense,Edit_Expense,"
                        . "Supplier_View,Add_Supplier,Delete_Supplier,Edit_Supplier,Sunday_School,Document_Storage,"
                        . "Certificate_Format,Admin_Activity,Add_Admin,Delete_Admin,Change_Password,Change_Username)"
                        . "VALUES ('$username_table','$login_date','$login_time',$session_status,$session_status,$session_status"
                        . ",$session_status,$session_status,$session_status,$session_status,$session_status,$session_status"
                        . ",$session_status,$session_status,$session_status,$session_status,$session_status"
                        . ",$session_status,$session_status,$session_status,$session_status,$session_status"
                        . ",$session_status,$session_status,$session_status,$session_status,$session_status)";
                
                if(mysqli_query($connection, $session_initial))
                {
                    //echo "session set";
                }
                else
                {
                    //echo "not set";
                }
                
                $session_id_qry = "SELECT Session_id FROM adminsession WHERE Admin_name = '$username_table'"
                        . " AND Login_date = '$login_date' AND Login_time = '$login_time'";
                $result_sid = mysqli_query($connection, $session_id_qry);
                if(mysqli_num_rows($result_sid) > 0)
                {
                    while($row= mysqli_fetch_assoc($result_sid))
                    {
                        $_SESSION['sid'] = $row['Session_id'];
                    }
                }
                //echo $_SESSION['sid'];
                header("Location: Dashboard/Dashboard.php?user=".$name_table);
                exit();
            }
            else
            {
                echo "<script>alert('Wrong Username or Password');window.location.href = 'LoginPage.html';</script>";
                //header("Location: LoginPage.html");
            }       
        }
    }
    

}

