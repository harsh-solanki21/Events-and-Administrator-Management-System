<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($connection)
{
    //echo "connection success";
}

session_start();

if($_GET)
{
    $user=$_GET['user'];
    //$session_id = $_GET['sid'];
}
else
{
    //echo "Url has no user";
}

?>
<html>
<head>
	<title>DashBoard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="Dashboard.js"></script>
	<link rel="stylesheet" href="Dashboard.css" />
        <script>
            function preventBack()
            {window.history.forward();}
            
            /*setTimeout("preventBack()",0);
            window.onunload=function(){null};*/
            
        </script>
</head>
<body onload="startTime(); setDate()">
	<div class="backgrd">
		<div class="topnavbar">
			<button onclick="member_detail()" class="navbutton" style="margin-left: 50px">Member Details</button>
			<button onclick="income_expense()" class="navbutton">Income & Expense</button>
			<button onclick="suppliers()" class="navbutton">Suppliers</button>
			<button onclick="sundaysschool()" class="navbutton">Sunday School</button>
			<button onclick="doc_store()" class="navbutton">Document Storage</button>
			<button onclick="certi_fmt()" class="navbutton">Certificate Formats</button>
			<button class=" dropdown-toggle navbutton" data-toggle="dropdown">
                            Settings
                            <span class="caret"></span>
                        </button>
			<div class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="../Logout.php">Log out</a>
                            </li>                            
                            <li>
                                <input type="hidden" id="user" value="<?php echo $user?>"/>
                                <a class="dropdown-item" onclick="Admin_activity()">
                                    Admin Activity
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="login_detail()">
                                    LogIn Activity
                                </a>
                            </li>                            
			</div>
		</div>
	</div>

	<div class="time_cal">
            <div class="time">
                <table style="text-align: center" border="0">
                    <tbody>                        
                        <tr>
                            <td id="hour"></td>
                            <td id="min"></td>
                            <td id="sec"></td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>&nbsp; Hours &nbsp;</td>
                            <td>&nbsp; Mins &nbsp;</td>
                            <td>&nbsp; Secs &nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="user">
                <h4><u>Welcome</u></h4>
                <h1 style="font-family: serif"><?php echo $user;?></h1>
            </div>
            
            <div class="cal">
                    <table style="text-align: center">
                        <tbody>                            
                            <tr>
                                <td id="date"></td>
                                <td id="month"></td>
                                <td id="year"></td>
                            </tr>
                            <tr style="font-weight: bold">
                                <td>&nbsp; Date &nbsp;</td>
                                <td>&nbsp; Month &nbsp;</td>
                                <td>&nbsp; Year &nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
		</div>
	</div>

	<div class="for_page">
		<iframe height="100%" id="content" class="for_page"> </iframe>
	</div>
</body>
</html>