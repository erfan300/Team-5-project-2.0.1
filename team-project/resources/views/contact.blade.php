<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
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

    <h1 class="heading"> <span>contact</span> us </h1>

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



<!--CSS-->

<style>
   
:root{
    --blue: #6c96b6;
    --darkgreen: #6a9b86; 
    --lightgreen: #c8e6d1; 
    --border: .1rem solid #6a9b86;
}

*{
font-family: 'Roboto', sans-serif;
margin:0; padding:0;
box-sizing: border-box;
outline: none; border:none;
text-decoration: none;
text-transform: capitalize;
transition: .2s linear;
}

html{

scroll-behavior: smooth;
}


body{
background: var(--darkgreen);
}

section{
padding:2rem 7%;

}

/* PAGE HEADING CSS */

.heading{
text-align: center;
color:#fff;
text-transform: uppercase;
padding-bottom: 3.5rem;
font-size: 30px;
text-decoration: underline 1.5px var(--lightgreen);
}

.heading span{
color:var(--lightgreen);
text-transform: uppercase;
}

.btn{
margin-top: 1rem;
display: inline-block;
padding:.9rem 3rem;
font-size: 1.7rem;
color:#fff;
background: var(--blue);
cursor: pointer;
}

.btn:hover{
letter-spacing: .2rem;
}

/* Header Styling */
header {
    background-color: var(--darkgreen);
    color: var(--lightgreen);
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Navigation Styling */

body {
    margin: 0;
    font-family: 'Arial', sans-serif;
}

nav {
    background-color: var(--darkgreen);
    overflow: hidden;
    text-align: center;
}

a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: background-color 0.3s;
}

a:hover {
    background-color: var(--blue); 
    color: black;
}

a.active {
    background-color: var(--blue);
    color: white;
}

nav a:last-child {
    border-right: none;
}

@media screen and (max-width: 600px) {
    nav a {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }
}




/* contact CSS */

.contact-section{
width: 100%;
display: flex;
justify-content: center;
align-items: center;
background: var(--lightgreen);
}

.contact-info{
color: black;
max-width: 500px;
line-height: 65px;
padding-left: 50px;
font-size: 18px;
}

.contact-info i{
margin-right: 20px;
font-size: 25px;
}

.contact-form{
max-width: 700px;
margin-right: 50px;
}

.contact-info, .contact-form{
flex: 1;
}

.contact-form h2{
color: black;
text-align: center;
font-size: 35px;
text-transform: uppercase;
margin-bottom: 30px;
}

.contact-form .text-box{
background: transparent;
color: black;
border: none;
width: calc(50% - 10px);
height: 50px;
padding: 12px;
font-size: 15px;
border-radius: 5px;
box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
margin-bottom: 20px;
opacity: 0.9;
border: solid black;
}

.subject-text-box{
    background: transparent;
    color: black;
    border: none;
    width: 100%;
    height: 50px;
    padding: 12px;
    font-size: 15px;
    border-radius: 5px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    opacity: 0.9;
    border: solid black;
}


.contact-form .text-box:first-child{
margin-right: 15px;
}

.contact-form textarea{
background: transparent;
color: black;
border: none;
width: 100%;
padding: 12px;
font-size: 15px;
min-height: 200px;
max-height: 400px;
resize: vertical;
border-radius: 5px;
box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
margin-bottom: 20px;
opacity: 0.9;
border: solid black;
}

.contact-form .send-btn{
float: right;
background: var(--blue);
color: #fff;
border: none;
width: 120px;
height: 40px;
font-size: 15px;
font-weight: 600;
text-transform: uppercase;
letter-spacing: 2px;
border-radius: 5px;
cursor: pointer;

}

.send-btn:hover{
background: lightblue;
}

/*Footer section*/
.footer {
    text-align: center;
    margin-top: 40px;
    background-color: #0b2e20;
    color: #fff;
    padding: 20px;
}

.image{
max-width: 100%;
height: auto;
}
</style>
</html>