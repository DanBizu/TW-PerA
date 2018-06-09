var modalBtn = document.getElementsByClassName('activityName');

var closeBtn = document.getElementsByClassName('modalClose');

windows.onload = function(){
  var jRequest = new XMLHttpRequest();
  
  jRequest.open('GET' , userUsername , true);
  
  jRequest.onload=function() {
    var activity = JSON.parse(jRequest.responseText);
  
    for( i =0 ; i< activity.length;i++){
        addElement(activity[i]);
    }
  
  };
  jRequest.send();
  }
  
/*
var addButton = document.getElementById("addButton");


addButton.onclick = function(){

  var modal = document.getElementById(this.dataset.modal);
  modal.style.display = "block";

  window.onclick = function(event) {
  if (event.target == modal) {
      modal.style.display = "none";
    }
  }



}


*/
for (var i = 0; i < modalBtn.length; i++) {

  var thisBtn = modalBtn[i];
  var thisClose = closeBtn[i];


  thisBtn.onclick = function () {
    var modal = document.getElementById(this.dataset.modal);
    modal.style.display = "block";

    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }


  thisClose.onclick = function () {
    var modal = document.getElementById(this.dataset.modal);
    modal.style.display = "none";
  }

}




function removeElement(childDiv) {

  if (document.getElementById(childDiv)) {
    var child = document.getElementById(childDiv);
    var parent = document.getElementById('scrollTab');
    parent.removeChild(child);
  } else {
    alert("Child div has already been removed or does not exist.");
    return false;
  }
}


var number = 5;


function addElement(data) {
  var aux = 'activityContainerButton' + number;
  var aux2 = "'" + aux + "'";
  var p = document.getElementById('scrollTab');
  var newElement = document.createElement("div");
  newElement.innerHTML = '<table class="activityContainer" , id="activityContainer' + number + ' " ><tr><th rowspan="2" , class="activityName" , data-modal="modalEdit'+ number +'">'+ data.name + '</th><td class="activityHour">' + data.start
  +'</td><th rowspan="2" , class="deleteButton"> <i class="fa fa-trash" , onclick="removeElement(' + aux2 + ')"></i></th>	</tr><tr><td class="activityDate">' + data.date + '</td></tr> </table>'
  newElement.setAttribute("class", "activityContainerButton")
  newElement.setAttribute("id", aux);
  p.appendChild(newElement);
  number++;
}

function ExpandSidebar() {
  var button = document.getElementById("sidebar-button");
  var sidebar = document.getElementById("sidebar");
  button.classList.toggle('invisible');
  sidebar.classList.toggle('visible');
}