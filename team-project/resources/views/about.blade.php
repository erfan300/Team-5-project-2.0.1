<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link href="{{ asset('css/aboutcss.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  </head>

  <!--Navigation start-->
  <header class="header">
        
    <a href="#"><img src="images/logo.png" class="logo" alt="logo"></a>
    
    <nav class="navbar">
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">About us</a>
        <a href="#">Sign up</a>
        <a href="#">Log in</a>
    </nav>
</header>

<!--Navigation end-->

<!--About us section start-->
<br><br><br><br><br><br><br><br>
    <body>
        <div class="heading">
            <h1>About Us</h1>
            </div>
            <div class="container">
                <section class="about">
                    <div class="about-content">
                        <h2>About us information.......</h2>
                    </div>
                </section>
            </div>
        </div>
        
        
        <br><br><br><br><br><br>

         <!--About section end-->

         <!--contact section start-->
    <div class="contact-section">
        <section class="contact-info">
          <div><i class="fas fa-map-marker-alt"></i>Aston University, Birmingham</div>
          <div><i class="fas fa-envelope"></i>info@books4u.com</div>
          <div><i class="fas fa-phone"></i>0121 204 3000</div>
        </section>

        <section class="contact-form">
          <h2>Contact Us</h2>
          <form class="contact" action="" method="post">
            <input type="text" name="name" class="text-box" placeholder="Your Name" required>
            <input type="email" name="email" class="text-box" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your message" required></textarea>
            <input type="submit" name="submit" class="send-btn" value="Send">
          </form>
        </section>
      </div>
      <!--contact section end-->

  </body>
</html>