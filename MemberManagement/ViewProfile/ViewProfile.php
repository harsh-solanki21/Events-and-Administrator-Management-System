<!DOCTYPE html>
<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "church_management";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$cm_id = $_POST["viewdet"];
?>
<html>
<head>
  <title>Member Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="ViewProfile.css">
  <script type="text/javascript" src="ViewProfile.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <div class="title">
      <h2 style="text-align: center">Member Profile</h2>
  </div>

  <!-- The upper Back and Edit button -->
  <div>
      <form method="POST">
          <button class="mybtn" style="margin-left: 20px;" formaction="../MemberDetails.php">
          Back to Member Details
          </button>
          <button class="mybtn" style="margin-left: 1070px" name="Editid"
                  formaction="../ShowEditDetails.php" value="<?php echo $cm_id ?>">
              Edit
          </button>
      </form>
  </div>

  <!-- Profile Pic -->
  <?php
    
    $churchmemberdetails = "SELECT * FROM church_member where CM_id = '$cm_id'";
    $result = mysqli_query($connection, $churchmemberdetails);
    if(mysqli_num_rows($result)> 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
    ?>
  <div>
      <img class="profilepic" src="<?php echo $row["CM_photo"];?>" alt="Profile pic">
  </div>

  <!-- Tabs of Personal Details and Donation Details -->
  <div style="margin-top: 20px;">
    <button class="mytabs" style="margin-left: 120px;" onclick="show_pd()">Personal Details</button>
    <button class="mytabs" style="margin-left: 0px;" onclick="show_d()">Donation Details</button>
  </div>

  <!-- Table for Details -->
  <div>
    <!-- Personal Details -->
    <table id="pd_table">
      <tr>
        <td>Name : </td>
        <td><?php echo $row["CM_name"]; ?></td>
      </tr>

      <tr>
        <td>Phone : </td>
        <td><?php echo $row["CM_phoneNo"]; ?></td>
      </tr>

      <tr>
        <td>Address : </td>
        <td><?php echo $row["CM_address"]; ?></td>
      </tr>

      <tr>
        <td>Date of Birth : </td>
        <td><?php echo $row["CM_DateOfBirth"]; ?></td>
      </tr>

      <tr>
        <td>Age : </td>
        <td><?php echo $row["CM_Age"]; ?></td>
      </tr>

      <tr>
        <td>Gender : </td>
        <td><?php echo $row["CM_Gender"]; ?></td>
      </tr>

      <tr>
        <td>Baptism date : </td>
        <td><?php echo $row["CM_BaptismDate"]; ?></td>
      </tr>

      <tr>
        <td>Confirmation date : </td>
        <td><?php echo $row["CM_ConfirmationDate"]; ?></td>
      </tr>

      <tr>
        <td>Marital Status : </td>
        <td><?php echo $row["CM_MaritalStatus"]; ?></td>
      </tr>

      <tr>
        <td>Occupation : </td>
        <td><?php echo $row["CM_Occupation"]; ?></td>
      </tr>

    </table>

    <!-- Donation Details -->
    <table id="d_table">
      <tr>
        <td>Yearly Donation  : </td>
        <td><?php echo $row["CM_YearlyDonation"]; ?></td>
      </tr>

      <tr>
        <td>Monthly Donation  : </td>
        <td><?php echo $row["CM_MonthlyDonation"]; ?></td>
      </tr>

      <tr>
        <td>Thanks Giving : </td>
        <td><?php echo $row["CM_ThanksGivingDoantion"]; ?></td>
      </tr>

      <tr>
        <td>Role in Church : </td>
        <td><?php echo $row["CM_RoleInchurch"]; ?></td>
      </tr>
    </table>
  </div>
  <?php
        }
    }
  ?>
</body>
</html>
