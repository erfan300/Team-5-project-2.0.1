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
        <h1>Books4U Bookstore</h1>
    </header>

    <!-- Navigation -->
    <nav>
        <a href="home">Home</a>
        <a href="profile">Profile</a>
        <a href="basket">Basket</a>
        <a href="login">Log In</a>
        <a href="about">About</a>
        <a href="contact">Contact</a>
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
           
            <input type="text" id="fname" name="firstname" placeholder="John Smith">
           <br>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Johnsmith@example.com">
            <br>
            <br>

            
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="10 Wall Street">
            <br>>
                <label for="zip" ></label > Postcode</label>
                <input type="text" id="postcode" name="Postcode">
              </div>
            </div>
          </div>
<br>
<br>
         
            <h3>Payment</h3>
            <br>
            <br>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John Smith">
            <br>
            <label for="ccnum">Card number</label>
            <input type="text" id="account number" name="cardnumber" placeholder="1111-2222-3333-4444">
            <br>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="ex-pmonth" name="exp-month" placeholder="September">
<br>
            <div class="row">
             
                <label for="exp-year">Exp Year</label>
                <input type="text" id="exp-year" name="exp-year" placeholder="2018">
                <br>
              </div>
              
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
<br>
<br>
</section>

        </div>
       
        </label>

        <label for="shipping_method">Shipping Method:</label><br>
        <select id="shipping_method" name="shipping_method" required>
            <option value="">Select Shipping Method</option>
            <option value="standard">Standard Shipping</option>
            <option value="express">Express Shipping</option>
            <option value="next_day">Next Day Delivery</option>
        </select><br><br>

        <input type="submit" value="Checkout">
    </form>
        <input type="submit" value="Purchase" class="btn">
      </form>
    </div>
  </div>

  

                       
                            

     
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

</html>