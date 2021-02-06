function viewPassword1()
{
    var passwordInput1 = document.getElementById('password-field1');
    var passStatus1 = document.getElementById('pass-status1');
    if (passwordInput1.type == 'password')
    {
        passwordInput1.type='text';
        passStatus1.className='fa fa-eye-slash';
    }
    else
    {
        passwordInput1.type='password';
        passStatus1.className='fa fa-eye';
    }
}
function viewPassword2()
{
    var passwordInput2 = document.getElementById('password-field2');
    var passStatus2 = document.getElementById('pass-status2');
    if (passwordInput2.type == 'password')
    {
        passwordInput2.type='text';
        passStatus2.className='fa fa-eye-slash';
    }
    else
    {
        passwordInput2.type='password';
        passStatus2.className='fa fa-eye';
    }
}

function ConfirmPassword()
{
    var pswd = document.getElementById("password-field1").value;
    var conpswd = document.getElementById("password-field2").value;
    //alert("pswd : "+pswd+" conpswd "+conpswd);
    if(pswd != conpswd)
    {
        alert("Confirm Password didn't match");
        document.getElementById("password-field2").style.borderColor = 'red';
        document.getElementById("submit_btn").disabled = true;
        document.getElementById("password-field2").focus();
    }
    else
    {
        
    }
}