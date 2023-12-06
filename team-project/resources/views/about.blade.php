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



<!-- about section starts  -->

<section class="about" id="about">
    <h1 class="heading"> <span>about</span> us </h1>
    <div class="row">
        <div class="image" >
            <img src="#" alt="">
        </div>
        <div class="content">
            <h3>Books4U</h3>            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus qui ea ullam, enim tempora ipsum fuga alias quae ratione a officiis id temporibus autem? Quod nemo facilis cupiditate. Ex, vel?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis, nihil voluptas culpa! Neque consectetur obcaecati sapiente?</p>
            <a href="#moreabout" class="btn">Read more</a>
        </div>
    </div>
</section>

<!-- about section ends -->

<!-- more about section starts -->

<section class="moreabout" id="moreabout">
    <div class="row">
        <div class="image">
        </div>
        <div class="content">
            <h3>Books4U</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus qui ea ullam, enim tempora ipsum fuga alias quae ratione a officiis id temporibus autem? Quod nemo facilis cupiditate. Ex, vel?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis, nihil voluptas culpa! Neque consectetur obcaecati sapiente?</p>
            <a href="#" class="btn">Get in contact</a>
        </div>
    </div>
</section>

<!-- more about section ends -->

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



/* CSS FOR HEADINGS */
.heading{
text-align: center;
color:#fff;
font-size:  30px;
text-decoration: underline 1.5px var(--lightgreen);
}

.heading span{
color:var(--lightgreen);
}

/* ABOUT US CSS */

.about .row{
display: flex;
align-items: center;
background:var(--lightgreen);
flex-wrap: wrap;
border: solid 3.5px black;
}

.about .row .image{
flex:1 1 45rem;
}

.about .row .image img{
width: 100%;
}
.about .row .content{
flex:1 1 45rem;
padding:2rem;
}

.about .row .content h3{
font-size: 25px;
font-weight: bold;
color:var(--darkgreen);
}

.about .row .content p{
font-size: 15px;
color:black;
line-height: 2;
padding:2rem 0;
}

.moreabout .row{
display: flex;
align-items: center;
background:var(--lightgreen);
flex-wrap: wrap;
border: solid 3.5px black;
}

.moreabout .row .image{
flex:1 1 45rem;
}

.moreabout .row .image img{
width: 100%;
}
.moreabout .row .content{
text-align: center;
padding:2rem;
}

.moreabout .row .content h3{
font-size: 25px;
font-weight: bold;
color:var(--darkgreen);
}

.moreabout .row .content p{
font-size: 15px;
color: black;
line-height: 2;
padding:2rem 0;
}

.image{
max-width: 100%;
height: auto;
}

.btn{
margin-top: 1rem;
display: inline-block;
padding:.9rem 3rem;
font-size: 15px;
color:#fff;
background: var(--blue);
cursor: pointer;
}

.btn:hover{
letter-spacing: .1rem;
}

/*Footer section*/
.footer {
    text-align: center;
    margin-top: 40px;
    background-color: #0b2e20;
    color: #fff;
    padding: 20px;
}

</style>
</html>