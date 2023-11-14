<header> 
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
   
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="/" />
    <link rel="stylesheet" type="text/css" href="css/style.css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"/>
    <script defer src="js/main.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
    
    </header>




    
    <body> 
        <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Books4U</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Basket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log In/Sign In </a>
            </li>
        </ul>
    </div>
</nav> 
    <div class="row">
      <div class="col-75">
        <div class="container">
          <form action="/action_page.php">
    
            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="firstname" placeholder="John Smith ">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="JohnSmith@example.com">
                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="11 Wall Street">
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="Birmingham">
    
                
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="WS4 7TT">
                  </div>
                </div>
              </div>
    
              <div class="col-50">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John Smith">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">
    
                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>
              </div>
    
            </div>
            <label>
              <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <input type="submit" value="Continue to checkout" class="btn">
          </form>
        </div>
      </div>
    
      <div class="col-25">
        <div class="container">
          <h4>Cart
            <span class="price" style="color:black">
              <i class="fa fa-shopping-cart"></i>
              <b>4</b>
            </span>
          </h4>
          <p><a href="#">Book 1</a> <span class="price">10£</span></p>
          <p><a href="#">Book 2</a> <span class="price">10£</span></p>
          <p><a href="#">Book 3</a> <span class="price">10£</span></p>
          <p><a href="#">Book 4</a> <span class="price">10£</span></p>
          <hr>
          <p>Total <span class="price" style="color:black"><b>40£</b></span></p>
        </div>
      </div>
    </div>
</body>