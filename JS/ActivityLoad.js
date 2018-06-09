windows.onload = function(){
var jRequest = new XMLHttpRequest();

jRequest.open('GET' , userUsername , true);

var number = 2;

function reuse(data) {
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

jRequest.onload=function() {
  var activity = JSON.parse(jRequest.responseText);

  for( i =0 ; i< activity.length;i++){
    console.log(activity[i].name)
      reuse(activity[i]);
  }

};
jRequest.send();
}


