var modalBtn = document.getElementsByClassName('activityContainerButton');

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
