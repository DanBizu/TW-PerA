function Transition() {
    var login = document.getElementById("loginBox");
    var register = document.getElementById("registerBox");
    login.classList.toggle('invisible');
    register.classList.toggle('visible');
}

function reversTransition() {
    var login = document.getElementById("loginBox");
    var register = document.getElementById("registerBox");
    login.classList.toggle('visible');
    register.classList.toggle('invisible');
}