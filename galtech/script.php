<!-- JavaScript Libraries -->

  <!-- Contact Form JavaScript File -->
<script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="contactform/contactform.js"></script>
<script src="js/main.js"></script>
  
<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
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
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
  <script>
    $(document ).ready(function() {
    var pagename = window.location.href.split("/");
      
        pagename  = pagename[pagename.length-1]
 
        if(pagename==""||pagename=="index.php"){
            $("#hometab").addClass("active");
        } else if(pagename=="about.php"){
            $("#aboutustab").addClass("active");
        }
        else if(pagename=="about.php"){
            $("#aboutustab").addClass("active");
        }
        else if(pagename=="services.php"){
            $("#servicetab").addClass("active");
        }
        else if(pagename=="news.php"){
            $("#newstab").addClass("active");
        }
        else if(pagename=="careers.php"){
            $("#careertab").addClass("active");
        }
        else if(pagename=="contact.php"){
            $("#contacttab").addClass("active");
        }
    else if(pagename=="b_w_models.php"||pagename=="color_models.php"||pagename=="super_short_throw.php"||pagename=="ultra_interactive_short_throw.php"||pagename=="ultra_short_throw.php"||pagename=="portable_installation.php"||pagename=="high_resolution_installation.php"||pagename=="ultra_high_resolution.php"||pagename=="dlp.php"||pagename=="led.php"||pagename=="interactive_display.php"||pagename=="wireless.php"){
            $("#producttab").addClass("active");
        }
        
});
</script>
      <script>
      jQuery(document).ready(function() {
		
	jQuery("#producttab").click(function() {
		
		jQuery(".dropdown-menu").slideToggle();
	});
	
});

      $('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 4
    }
  }
})
    </script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c20df4f7a79fc1bddf21be6/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>