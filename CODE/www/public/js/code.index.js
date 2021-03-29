//NAVBAR
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "5px 10px";
  } else {
    document.getElementById("navbar").style.padding = "40px 10px";
  }
}




function setNote(star1, star2, star3, star4, star5){
  let note = 0;
  if (star5.className == "gold"){
    note = 5;
  }
  else if (star4.className == "gold"){
    note = 4;
  }
  else if (star3.className == "gold"){
    note = 3;
  }
  else if (star2.className == "gold"){
    note = 2;
  }
  else if (star1.className == "gold"){
    note = 1;
  }
  return note;



}


let note = 0;
if (document.getElementById('star5{$id}').className === "gold"){
    note = 5;
}
else if (document.getElementById('star4{$id}').className === "gold"){
    note = 4;
}
else if (document.getElementById('star3{$id}').className === "gold"){
    note = 3;
}
else if (document.getElementById('star2{$id}').className === "gold"){
    note = 2;
}
else if (document.getElementById('star1{$id}').className === "gold"){
    note = 1;
}