var modalBtn = document.getElementsByClassName('activityName');

var closeBtn = document.getElementsByClassName('modalClose');

for (var i = 0; i < modalBtn.length; i++) {

  var thisBtn = modalBtn[i];
  var thisClose = closeBtn[i];


  thisBtn.onclick = function(){
    var modal = document.getElementById(this.dataset.modal);
    modal.style.display = "block";

    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }


  thisClose.onclick = function(){
    var modal = document.getElementById(this.dataset.modal);
    modal.style.display = "none";
  }

}

function removeElement(parentDiv, childDiv){
     if (childDiv == parentDiv) {
          alert("The parent div cannot be removed.");
     }
     else if (document.getElementById(childDiv)) {
          var child = document.getElementById(childDiv);
          var parent = document.getElementById(parentDiv);
          parent.removeChild(child);
     }
     else {
          alert("Child div has already been removed or does not exist.");
          return false;
     }
}

function addElement() {
    var p = document.getElementById('tableContainer1');
    var newElement = document.createElement("DIV" );
    newElement.innerHTML = '<table class="activityContainer" , id="activityContainer1" ><tr><th rowspan="2" , class="activityName" , data-modal="modalEdit1"> Tenis </th><td class="activityHour">17.00-19.00</td><th rowspan="2" , class="deleteButton"> <i class="fa fa-trash" , onclick="removeElement('+'tableContainer1'+','+ 'activityContainerButton1'+')"></i></th>	</tr><tr><td class="activityDate">23/06/2019</td></tr> </table>'
    newElement.setAttribute("class","activityContainerButton")
    newElement.setAttribute("id","activityContainerButton1")
      newElement.innerHTML.color="white";
    p.appendChild(newElement);
}


function ExpandSidebar(){
  var button = document.getElementById("sidebar-button");
  var sidebar = document.getElementById("sidebar");
  button.classList.toggle('invisible');
  sidebar.classList.toggle('visible');
}