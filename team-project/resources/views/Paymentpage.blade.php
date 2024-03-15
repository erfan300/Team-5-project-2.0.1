<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="css/payment.css" />
    <script defer src="js/main.js"></script>
</head>

<body>
    <header>


    <div class="top-left">
        <div class="login-buttons">
            <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
            <a href="register"><i class="fas fa-user-plus"></i> Register</a>
            @auth
                <a href="profile"><i class="fas fa-user"></i> Profile</a>
            @endauth
        </div>
    </div>
    <h1>BOOKS<span>4</span>U</h1>
    <div class="session-message">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    @auth
        <div class="log-out-box">
            <form class="inLine" method="POST" action="/logout">
                @csrf
                <button type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
        <div class="welcome-message">
            <span>Welcome {{ auth()->user()->Username }}</span>
        </div>
    @endauth

</header>

    <!-- Navigation -->
    <nav>
    <a href="home"><i class="fas fa-home"></i> Home</a>
    <a href="basket"><i class="fas fa-shopping-basket"></i> Basket</a>
    <a href="wishlist"><i class="fas fa-heart"></i> Wishlist</a>
    <a href="about"><i class="fas fa-info-circle"></i> About</a>
    <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
       
        
    </nav>
    <br><br>

    <!-- Payment page -->

    <section id="Payment page" class="container mt-5">
    <header>
        <h2>Checkout </h2>
    <header>
      <br>
      <section>   
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
           <br>
            <input type="text" id="fname" name="firstname" placeholder="John Smith">
           <br>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <br>
            <input type="text" id="email" name="email" placeholder="Johnsmith@example.com">
            <br>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <br>
            <input type="text" id="adr" name="address" placeholder="10 Wall Street">
            <br>>
                <label for="zip" ></label > Postcode</label>
                <br>
                <input type="text" id="postcode" name="Postcode">
              </div>
            </div>
          </div>
<br>
<br>
         
<h3 class="title">Payment</h3>
            <br>
<label for="shipping_method">Shipping Method:</label><br>
        <select id="shipping_method" name="shipping_method" required>
            <option value="">Select Shipping Method</option>
            <option value="standard">Standard Shipping</option>
            <option value="express">Express Shipping</option>
            <option value="next_day">Next Day Delivery</option>
        </select><br><br>


            <br>
            <label for="cname">Name on Card</label>
            <br>
            <input type="text" id="cname" name="cardname" placeholder="John Smith">
            <br>
            <label for="ccnum">Card number</label>
            <br>
            <input type="text" id="account number" name="cardnumber" placeholder="1111-2222-3333-4444">
            <br>
            <label for="expmonth">Exp Month</label>
            <br>
            <input type="text" id="ex-pmonth" name="exp-month" placeholder="September">
<br>
             
                <label for="exp-year">Exp Year</label>
                <br>
                <input type="text" id="exp-year" name="exp-year" placeholder="2018">
                <br>
              </div>
              
                <label for="cvv">CVV</label>
                <br>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
<br>
<br>
</section>

        </div>
       
        </label>

        

       
    
    <div class="purchase">
            <a href="{{ route('payment-page') }}" class="btn btn-success">Purchase</a>
        </div>


        
      </form>
    </div>
  </div>


  <!-- Footer -->
  <section class="footer">
        <div class="footer-content">
            <div class="footer-section about">
                <h3>About Us</h3>
                <p>Welcome to Books4U, the place where the love for writing intertwines with the art of storytelling. We strongly believe in the transformative power of books, and their ability to greatly impact individuals, as well as communities. Our main purpose is to inspire, attract, and ignite the imaginations of the people who enjoy reading books.</p>
                <section class="footer-section contact">
    <h3>Contact Us</h3>
    <ul>
        <li><i class="fas fa-phone"></i> Phone: +44 0121 456 7894</li>
        <li><i class="fas fa-envelope"></i> Email: Books4U@gmail.com</li>
        <div class="social-media">
        <a href="https://www.instagram.com/your_instagram" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com/your_facebook" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com/your_twitter" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
    </ul>
</section>
            </div>
        <div class="footer-section links">
                <h3>Quick Links</h3>
                <a href="about"><i class="fas fa-info-circle"></i> About</a>
                <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
                <a href="home"><i class="fas fa-home"></i> Home</a>
                <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
                <a href="register"><i class="fas fa-user-plus"></i> Register</a>
            </div>
            <div class="footer-section contact-form">
                <h3>Contact Us</h3>
                <form action="#" method="post">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
                    <textarea rows="4" name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
                    <button type="submit" class="btn btn-big contact-btn">
                        <i class="fas fa-envelope"></i>
                        Send
                    </button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Books4U Bookstore. All rights reserved.
        </div>
    </section>

</body>

                       
                            

  <!--  
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');

    section{

      float: center
    }
    :root {
        --blue: #6c96b6;
        --darkgreen: #384b42;
        --lightgreen: #6a9b86;
        --border: .1rem solid #6a9b86;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: var(--lightgreen);
        color: var(--lightgreen);
    }

    /* Header Styling */
    header {
        background-color: var(--lightgreen);
        color: #a7eecf;
        padding: 20px;
        text-align: center;
    }

    /* Navigation Styling */
    nav {
        background-color: var(--darkgreen);
        overflow: hidden;
        text-align: center;
    }

    nav a {
        display: inline-block;
        color: var(--lightgreen);
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    nav a:hover {
        background-color: var(--blue);
        color: black;
    }

    /* Shopping Basket Items */
    .basket-page {
        margin: 80px auto;
    }

    table {
        width: 95%;
        border: collapse;
        margin: auto;
        background-color: white;
        height: 100px;
    }

    h2 {
        position: absolute;
        left: 100px;
        top: 200px;
    }

    .basket-page thead tr {
        background-color: black;
        font-weight: normal;
        text-align: left;
        padding: 60px;
    }

    .btn {
        /* Removed absolute positioning */
        background: var(--darkgreen);
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.2s linear;
    }

    .btn:hover {
        background: var(--blue);
    }

    #checkout-button {
        position: relative;
        margin-top: 20px; 
    }


</style>






</body>
Footer --> 

</html>