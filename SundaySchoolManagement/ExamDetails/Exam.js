
function cal()
{

var att = document.getElementById("att").value;
var fix_att = document.getElementById("fix_att").value;

var result = (parseFloat(att)/parseFloat(fix_att))*100;

if(!isNaN/(result))
{
document.getElementById("att_1").innerHTML=result;
}
}

function myFunction() 
{
    var printCon = document.getElementById("pri").innerHTML;
    var oriCon = document.body.innerHTML;
    
    document.body.innerHTML = printCon;
    window.print();
    document.body.innerHTML = oriCon;
 }