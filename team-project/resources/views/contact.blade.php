<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <h1>Books4U BookStore</h1>
 
    <nav>
     <a href="home">Home</a>
     <a href="profile">Profile</a>
     <a href="basket">Basket</a>
     <a href="login">Log In</a>
     <a href="about">About</a>
     <a href="contact">Contact</a>
 </nav>
 
 </header>
 
 <!-- header section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading">Contact Us </h1>

</section>

         <div class="contact-section">
            <section class="contact-info">
              <div><i class="fas fa-map-marker-alt"></i>Aston University, Birmingham</div>
              <div><i class="fas fa-envelope"></i>info@books4u.com</div>
              <div><i class="fas fa-phone"></i>0121 204 3000</div>
            </section>
    
    
            <section class="contact-form">
              <h2>Books4U</h2>
              <form class="contact" action="{{ route('save.contact') }}" method="post">
    @csrf
    <input type="text" name="Name" class="text-box" placeholder="Your Name" required>
    <input type="email" name="Email" class="text-box" placeholder="Your Email" required>
    <input type="text" name="Subject" class="subject-text-box" placeholder="Subject" required>
    <textarea name="Message" rows="5" placeholder="Your message" required></textarea>
    <!-- Add additional fields if needed for Status, Response, etc. -->
    <input type="submit" class="send-btn" value="Send" name="send">
</form>


            </section>
          </div>
          <!--contact section end-->

          <!-- footer section starts  -->
          <section class="footer">
            <h6>&copy; 2023 Books4U Bookstore. All rights reserved.</h6>
        </section>

        <!-- footer section ends -->

</body>

</html>