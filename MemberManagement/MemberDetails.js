var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++)
{
	coll[i].addEventListener("click", function()
	{
		this.classList.toggle("active");
		var content = this.nextElementSibling;
		if (content.style.maxHeight)
			{
				content.style.maxHeight = null;
			}
		else
			{
				content.style.maxHeight = content.scrollHeight + "px";
			} 
	});
}

var viewbtn = document.getElementsByClassName("viewbutton");

for (j=0; j<=viewbtn.length; j++)
{
	viewbtn[j].onclick = function()
	{
		window.location.href = "View Profile/ViewProfile.php";
	}
}
