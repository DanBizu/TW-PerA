function ExpandSidebar() {
	var button = document.getElementById("sidebar-button");
	var sidebar = document.getElementById("sidebar");
	button.classList.toggle('invisible');
	sidebar.classList.toggle('visible');
}