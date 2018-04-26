var openActivities = document.getElementsByClassName("Friend");
var closeActivities = document.getElementById("modalActivitiesClose");
var i;
var modalActivities = document.getElementById("modalActivities");

for (i = 0; i < openActivities.length; i++) {
    openActivities[i].onclick = function () {
        modalActivities.style.display = "block";

        window.onclick = function (event) {
            if (event.target == modalActivities) {
                modalActivities.style.display = "none";
            }
        }
    }

}

closeActivities.onclick = function () {
    modalActivities.style.display = "none";
}


var openAdd = document.getElementById("add-friend-btn");
var modalAdd = document.getElementById("modalAddFriend");
var closeAdd = document.getElementById("modalAddClose");

openAdd.onclick = function () {
    modalAdd.style.display = "block";

    window.onclick = function (event) {
        if (event.target == modalAdd) {
            modalAdd.style.display = "none";
        }
    }
}

closeAdd.onclick = function () {
    modalAdd.style.display = "none";
}



function ExpandSidebar() {
    var button = document.getElementById("sidebar-button");
    var sidebar = document.getElementById("sidebar");
    button.classList.toggle('invisible');
    sidebar.classList.toggle('visible');
}