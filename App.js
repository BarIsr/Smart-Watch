// Get the container element
var btnContainer = document.getElementById("myNavbar");

// Get all buttons with class="btn" inside the container
var link = btnContainer.getElementsByTagName("li");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < link.length; i++) {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";

}
