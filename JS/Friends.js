var acc = document.getElementsByClassName("Friend");
var table = document.getElementById("toBeExpanded");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
    	if(table.style.display == "none"){
    		table.style.display = "block";
    		this.className = "active";
    	} else {
    		table.style.display = "none";
    		this.className = "";
    	}
    }
}

function ExpandSidebar(){
	var button = document.getElementById("sidebar-button");
	var sidebar = document.getElementById("sidebar");
	button.classList.toggle('invisible');
	sidebar.classList.toggle('visible');
}