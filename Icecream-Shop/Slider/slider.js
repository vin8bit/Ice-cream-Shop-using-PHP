var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

//Automatic Slideshow
var aslideIndex = 0;
carousel();

function carousel() {
  var i;
  var k;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (k = 0; k < dots.length; k++) {
      dots[k].className = dots[k].className.replace(" active", "");
  }
  
  aslideIndex++;
  if (aslideIndex > x.length) {aslideIndex = 1}
  x[aslideIndex-1].style.display = "block";
  dots[aslideIndex-1].className += " active";
  setTimeout(carousel, 2000); 
}










