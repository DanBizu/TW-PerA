var modalBtn = document.getElementsByClassName('activityContainerButton');

var closeBtn = document.getElementsByClassName('modalClose');

for (var i = 0; i < modalBtn.length; i++) {

  var thisBtn = modalBtn[i];
  var thisClose = closeBtn[i];

  thisBtn.onclick = function(){
    var modal = document.getElementById(this.dataset.modal);
    modal.style.display = "block";
  }

  thisClose.onclick = function(){
    var modal = document.getElementById(this.dataset.modal);
    modal.style.display = "none";
  }

}
