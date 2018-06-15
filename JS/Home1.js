function loading(){
    var jRequest = new XMLHttpRequest();
    
    jRequest.open('GET' , userUsername , true);
    
    var number = 2;
    
    function createActivity(data) {
      var aux = 'activityContainerButton' + number;
      var aux2 = "'" + aux + "'";
      var aux3 = "'"+'modalEdit'+ number  + "'" ; 
      
      var aux4= "onsubmit="+ '"' + "return confirm('Do you really want to delete this  activity ?');" + '"';
      var p = document.getElementById('scrollTab');
      var newElement = document.createElement("div");
      newElement.setAttribute("class", "activityContainerButton")
      newElement.setAttribute("data-id", data.id );
      newElement.setAttribute("id", aux);
      newElement.innerHTML = '<table class="activityContainer" , id="activityContainer' + number + ' " ><tr><th rowspan="2" class="activityName" onclick="modify('+aux3+')" data-modal="modalEdit'+ number +'">'+ data.name + '</th><td class="activityHour">' + data.start + '</td><th rowspan="2"  class="deleteButton"  ><form method="POST" class="something" action="../PHP/delete.lib.php" ' + aux4 + '> <input type="hidden"  name="activityId" value="'+data.id+'"> <button type="submit" class="fa fa-trash" name="deleteAct" ></button></th>	</tr><tr><td class="activityDate">' + data.date + '</td></tr> </table>'
      p.appendChild(newElement);

    }

    function modifyActivity(data){
        var aux = 'modalEdit' + number;
        var aux2 = "'" + aux + "'";
        var v = document.getElementById('modalList');
        var newElement = document.createElement("div");
        newElement.setAttribute("class", "modalEdit");
        newElement.setAttribute("id", aux);
        newElement.innerHTML = '<div class="modalContent" id="modalContentModify'+number+'"><span class="modalClose" id="modalClose'+number+'" onclick="closeModal('+"'"+aux+"'"+')">&times;</span><form action="../PHP/modAct.lib.php"  method="POST"> Activity Name:<input type="text" name="activityName" value="'+data.name+'" required><br>Activity date:<input type="date" name="activityDate" value="'+data.date+'" required><br>Activity time:<input type="time" value="activityStart" name="activityStart" value="'+ data.start +'" required>		<br>Duration:<input type="number" min=0 max=24 name="activityDuration" value="'+ data.duration +'" required><br> How Often :<select  name="activityRepeat" value="'+ data.repetition +'"  required> <option value="Daily">Daily</option> <option value="Weekly">Weekly</option><option value="Monthly">Monthly</option><option value="Once">Only Once</option> </select>	<br> Location:<input type="text" name="activityLocation" value="'+ data.location +'"   required><br> Type of activity:<select  name="activityType" value="'+ data.type +'"  required><option value="Sport">Sport</option><option value="Work">Work</option><option value="School">School</option><option value="Personal">Personal</option><option value="Other">Other</option> </select>	<br> Visibility:<select  name="activitiPrivacy" value="'+ data.privacy +'" required><option value="Visible">Visible</option><option value="Private">Private</option> </select>	<input type="text" name="activityId" value="'+ data.id +'" style="display:none;"> <br>	<input type="submit" name="modActivity" value="Submit"></form></div></div>'
        v.appendChild(newElement);
    }
    
    jRequest.onload=function() {
      var activity = JSON.parse(jRequest.responseText);
    
      for( i =0 ; i< activity.length;i++){
        createActivity(activity[i]);
        modifyActivity(activity[i]);
        number++;
      }
    
    };
    jRequest.send();
}

function modify(iteam){
    var modal = document.getElementById(iteam);
    modal.style.display="block";
}
function closeModal(iteam){
    var modal = document.getElementById(iteam);
    modal.style.display="none";
}

function openAddForm(){
    var form = document.getElementById("modalEditAdd");
    form.style.display="block";
}

function closeAddForm(){
    var form = document.getElementById("modalEditAdd");
    form.style.display="none";

}

function ExpandSidebar() {
    var button = document.getElementById("sidebar-button");
    var sidebar = document.getElementById("sidebar");
    button.classList.toggle('invisible');
    sidebar.classList.toggle('visible');
}

window.onclick = function(event) {
    var form = document.getElementById("modalEditAdd");
    
    if (event.target == form) {
        
        form.style.display = "none";
    }
}

function removeElement(childDiv) {
    var delete_confirmed=confirm("Are you sure you want to delete this file?");

    if (delete_confirmed==true) {
        if (document.getElementById(childDiv)) {
            var child = document.getElementById(childDiv);
            var parent = document.getElementById('scrollTab');
            parent.removeChild(child);
          } else {
            alert("Child div has already been removed or does not exist.");
            return false;
          }
    } else { 
       // this one returns the user if he/she clicks no :)
       document.location.href = './Home.php';
    }

}