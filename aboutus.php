<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Real-Estate-Landing-Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script>

        let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
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
    </script>
</head>

<header>      
    <div class="header-content">
        <div class="logo">
            <a href="index.php">
                <h1><span class="logo-title">Home Z</span></h1>
            </a>
        </div>
        <div class="navbar">
        <ul class="nav-items">
                <li><a class="active" href="index.php">Home</a></li>
                <?php if(isset($_SESSION['name'])): ?>
               <li><a href="aboutus.php">About Us</a></li>
                 <li><a href="logout.php">Logout</a></li>
                 <li><a href="contactus.php">Contact Us</a></li>
                <?php else: ?>
                  <li><a href="aboutus.php">About Us</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                 <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<section class="section2">
    <div class="content">
        <div class="image">
        </div>
        <div class="triangle">
        </div>
        <div class="three-features">
            <div class="feature1">
                <h2><span>Home Z</span></h2>
                <p>Home Z is a real estate platform that hepls costumers around Kosovo find the property they like.
                     We offer fast and reliable services, and of course very budget friendly options.
                     We are the leading company in Kosovo for finding the best location with the best property for the lowest price.
                     Home Z is one of the fastest growing platorms in Kosovo, and continues to grow every year.</p>
            </div>
            <div class="feature2">   
                <p>Home Z is a real estate platform that hepls costumers around Kosovo find the property they like.
                    We offer fast and reliable services, and of course very budget friendly options.
                    We are the leading company in Kosovo for finding the best location with the best property for the lowest price.
                    Home Z is one of the fastest growing platorms in Kosovo, and continues to grow every year.</p>
            </div>
            <div class="feature3">               
                <p>Home Z is a real estate platform that hepls costumers around Kosovo find the property they like.
                    We offer fast and reliable services, and of course very budget friendly options.
                    We are the leading company in Kosovo for finding the best location with the best property for the lowest price.
                    Home Z is one of the fastest growing platorms in Kosovo, and continues to grow every year.</p>
            </div>
            <div class="feature3">               
                <p>Home Z is a real estate platform that hepls costumers around Kosovo find the property they like.
                    We offer fast and reliable services, and of course very budget friendly options.
                    We are the leading company in Kosovo for finding the best location with the best property for the lowest price.
                    Home Z is one of the fastest growing platorms in Kosovo, and continues to grow every year.</p>
            </div>
        </div>
    </div>
</section>
<div class="slideshow-container">
    <div class="mySlides fade">
      <img src="fotot/house1.jpg" style="width:100%">
    </div>
    <div class="mySlides fade">
      <img src="fotot/house2.jpg" style="width:100%">
    </div>
    <div class="mySlides fade">
      <img src="fotot/house3.jpg" style="width:100%">
     </div>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
    <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
</header>  















