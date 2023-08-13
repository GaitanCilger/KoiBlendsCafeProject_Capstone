function loadDoc() {

  setInterval(function(){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("bell").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "usernotif.php", true);
  xhttp.send();
  
  },1000);

}

loadDoc();

function uNotif() {
  document.getElementById("myF").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.fallbtn img')) {
    var dropdowns = document.getElementsByClassName("fall-c");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

let slider = tns({
    container : ".my-slider",
    "slideBy" : "1 ",
    "speed" : 400,
    "nav" : false,
    autoplay : true,
    controls: false,
    autoplayButtonOutput : false,
    responsive: {
        1600: {
            items : 1,
            gutter: 20
        },
        1024: {
            items : 1,
            gutter : 20
        },
        768: {
            items: 1,
            gutter: 20

            
        },
        480: {
            items: 1,
        }
    }
})