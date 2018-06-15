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



/*
var btnDisplayActivities = document.getElementById("buttonDisplayActivities");
btnDisplayActivities.onclick = function() {
    modalActivities.stylde.display = "block";

    window.onclick = function (event) {
        if(event.target == modalActivities) {
            modalActivities.style.display = "none";
        }
    }
}

closeActivities.onclick = function () {
    modalActivities.style.display = "none";
}

*/
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

function loadActivities(){

  var request = new XMLHttpRequest();

  request.open('GET', currUser, true);

    function createTable(data){
     
        var table = document.getElementById('activityTable');
        var row = table.insertRow(1);
        var nameCell = row.insertCell(0);
        var dateCell = row.insertCell(1);
        var locationCell = row.insertCell(2);
        var startCell = row.insertCell(3);
        var durationCell = row.insertCell(4);

        nameCell.innerHTML = data.name;
        dateCell.innerHTML = data.date;
        locationCell.innerHTML = data.location;
        startCell.innerHTML = data.start;
        durationCell.innerHTML = data.duration;
    
    }

    request.onload=function() {
      var activity = JSON.parse(request.responseText);

      for( i = 0; i < activity.length; i++){
        createTable(activity[i]);
      }
    };
    request.send();
}