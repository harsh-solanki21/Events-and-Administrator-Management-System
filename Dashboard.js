/* function display()
    {
 	alert("Connected");
    }
*/

function Admin_activity()
{
    var user = document.getElementById("user").value;
    document.getElementById("content").src= "AdminActivity/AdminActivity.php?user="+user;
    document.getElementById("content").scrollIntoView();
}
function login_detail()
{
  document.getElementById("content").src= "AdminActivity/LogInActivity.php";
  //document.getElementById("content").focus();
  document.getElementById("content").scrollIntoView();
}
function member_detail()
{
  document.getElementById("content").src= "MemberManagement/MemberDetails.php";
  //document.getElementById("content").focus();
  document.getElementById("content").scrollIntoView();
}

function income_expense()
{
  document.getElementById("content").src= "IncomeExpense/SelectYear.html";
  //document.getElementById("content").focus();
  document.getElementById("content").scrollIntoView();    
}
function suppliers()
{
  document.getElementById("content").src= "SupplierDetailsManagement/Supplier.php";
  //document.getElementById("content").focus();
  document.getElementById("content").scrollIntoView();	
}
function sundaysschool()
{
    document.getElementById("content").src= "SundaySchoolManagement/SundaySchoolYear.php";
    //document.getElementById("content").focus();
    document.getElementById("content").scrollIntoView();
}
function doc_store()
{
    document.getElementById("content").src= "DocumentStorage/ReportsAndLegalCases.html";
    //document.getElementById("content").focus();
    document.getElementById("content").scrollIntoView();
}
function certi_fmt()
{
    document.getElementById("content").src= "CertificateFormats/View_Certificate.php";
    //document.getElementById("content").focus();
    document.getElementById("content").scrollIntoView();
}
//Digital clock code starts
function startTime() 
{
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('hour').innerHTML = h ;
  document.getElementById('min').innerHTML = m ;
  document.getElementById('sec').innerHTML = s ;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) 
{
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
//Digital clock code ends

//Date code starts
function setDate()
{
    var d = new Date();
    var dt = d.getDate();
    var mth = d.getMonth()+1;
    var yr = d.getFullYear();
    document.getElementById('date').innerHTML = dt;
    document.getElementById('month').innerHTML = mth;
    document.getElementById('year').innerHTML = yr;
}
//Date code ends
