function validateForm() {
    var x = document.forms["taskForm"]["title"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
}

function validateLoginForm() {
var x = document.forms["loginForm"]["username"].value;
var y = document.forms["loginForm"]["password"].value;
if (x == "") {
    alert("Username must be filled out!");
    return false;
}
if (y == "") {
    alert("Password must be filled out!");
    return false;
}
}
function validateRegisterForm() {
    var x = document.forms["registerForm"]["username"].value;
    var y = document.forms["registerForm"]["password"].value;
    if (x == "") {
        alert("Username must be filled out!");
        return false;
    }
    if (y == "") {
        alert("Password must be filled out!");
        return false;
    }
    }