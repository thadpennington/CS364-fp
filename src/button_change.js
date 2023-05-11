var buttons = document.getElementsByClassName("button");

for (var i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", function() {
    // Remove the "button-clicked" class from all buttons
    for (var j = 0; j < buttons.length; j++) {
      buttons[j].classList.remove("button-clicked");
    }
    
    // Add the "button-clicked" class to the clicked button
    this.classList.add("button-clicked");
  });
}