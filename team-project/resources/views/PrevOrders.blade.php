<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/prevorders.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>

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

<button onclick="goBack()" class="custom-button">Previous Page</button>

<script>
function goBack() {
  window.history.back();
}
</script>

<style>
.custom-button {
    background-color: var(--accent-color);
    color: var(--secondary-color);
    border: none;
    padding: 10px 20px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    border-radius: 5px;
}

.custom-button:hover {
    background-color: var(--secondary-color);
    color: var(--accent-color);
}
</style>

    <section>
    <h2>Previous Orders</h2>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Order Date</th>
                <th>Order Process</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                @foreach($order->orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $order->Order_ID }}</td>
                        <td>{{ $orderDetail->product->Product_Name }}</td>
                        <td>{{ $orderDetail->Quantity }}</td>
                        <td>{{ $orderDetail->Subtotal }}</td>
                        <td>{{ $order->Order_Date }}</td>
                        <td>{{ $order->Order_Process }}</td>
                        <td>
                            <form method="POST" action="{{ route('return-order', $orderDetail->OrderDetail_ID) }}">
                                @csrf
                                <button type="submit" style="background-color: black; color: white;">Return Order</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</section>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

