function Expand(){

	var panel = document.getElementById("toBeExpanded");

	if(panel.style.display === "block"){
		panel.style.display = "none";
	}
	else{
		panel.style.display = "block";
	}

}

function ExpandSidebar(){
	var button = document.getElementById("sidebar-button");
	var sidebar = document.getElementById("sidebar");
	button.classList.toggle('invisible');
	sidebar.classList.toggle('visible');
}