//NAVBAR
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "5px 10px";
  } else {
    document.getElementById("navbar").style.padding = "40px 10px";
  }
}

//Connect Button
var conButton = document.getElementById("connexionButton");
var conPage = document.getElementById("connexionPage");
function afficherConPage(){
  if(conPage.style.display=="none")
  {
    conPage.style.display="block";
  }
  else{
    conPage.style.display="none";
  }
}
conButton.addEventListener('click', function(){afficherConPage()});