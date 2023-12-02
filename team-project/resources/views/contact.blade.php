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

    <a href="#" class="logo">
        <img src="images/logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Products</a>
        <a href="#">Contact</a>
        <a href="#">Sign up/log in</a>
    </nav>

</header>

<!-- header section ends -->

<br><br><br><br><br><br><br><br>

<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading"> <span>contact</span> us </h1>

</section>

<!-- contact section ends -->


         <!--contact section start-->
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
    <input type="text" name="Subject" class="text-box" placeholder="Subject" required>
    <textarea name="Message" rows="5" placeholder="Your message" required></textarea>
    <!-- Add additional fields if needed for Status, Response, etc. -->
    <input type="submit" class="send-btn" value="Send" name="send">
</form>


            </section>
          </div>
          <!--contact section end-->


          <!-- footer section starts  -->

<section class="footer">

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="links">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Products</a>
        <a href="#">Contact</a>
        <a href="#">Sign up/log in</a>
    </div>

</section>

<!-- footer section ends -->
</body>








<!--CSS-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');

:root{
--blue:#6c96b6;
--darkgreen:#384b42;
--lightgreen:#6a9b86;
--border:.1rem solid #6a9b86;
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
font-size: 62.5%;

scroll-behavior: smooth;
}



body{
background: var(--darkgreen);
}

section{
padding:2rem 7%;

}

.heading{
text-align: center;
color:#fff;
text-transform: uppercase;
padding-bottom: 3.5rem;
font-size: 4rem;
}

.heading span{
color:var(--blue);
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

.header{
background: var(--darkgreen);
display: flex;
align-items: center;
justify-content: space-between;
padding:1.5rem 7%;
border-bottom: var(--border);
position: fixed;
top:0; left: 0; right: 0;
z-index: 1000;
}

.header .logo img{
height: 6rem;
}

.header .navbar a{
margin:0 1rem;
font-size: 1.6rem;
color:#fff;
}

.header .navbar a:hover{
color:var(--blue);
border-bottom: .1rem solid var(--blue);
padding-bottom: .5rem;
}


.header .icons div{
color:#fff;
cursor: pointer;
font-size: 2.5rem;
margin-left: 2rem;
}

.header .icons div:hover{
color:var(--blue);
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
color: #fff;
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
color: #fff;
text-align: center;
font-size: 35px;
text-transform: uppercase;
margin-bottom: 30px;
}

.contact-form .text-box{
background: transparent;
color: #fff;
border: none;
width: calc(50% - 10px);
height: 50px;
padding: 12px;
font-size: 15px;
border-radius: 5px;
box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
margin-bottom: 20px;
opacity: 0.9;
border: solid #fff;
}

.contact-form .text-box:first-child{
margin-right: 15px;
}

.contact-form textarea{
background: transparent;
color: #fff;
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
border: solid #fff;
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

.footer{
background:var(--darkgreen);
text-align: center;
}

.footer .share{
padding:1rem 0;
}

.footer .share a{
height: 5rem;
width: 5rem;
line-height: 5rem;
font-size: 2rem;
color:#fff;
border:var(--border);
margin:.3rem;
border-radius: 50%;
}

.footer .share a:hover{
background-color: var(--blue);
}

.footer .links{
display: flex;
justify-content: center;
flex-wrap: wrap;
padding:2rem 0;
gap:1rem;
}

.footer .links a{
padding:.7rem 2rem;
color:#fff;
border:var(--border);
font-size: 2rem;
}

.footer .links a:hover{
background:var(--blue);
}


.image{
max-width: 100%;
height: auto;
}
</style>
</html>