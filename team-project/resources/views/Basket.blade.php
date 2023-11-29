<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="/" />
    <script defer src="js/main.js"></script>
</head>

<body>
    <!-- Navigation -->
    <nav>
        <a href="home">Home</a>
        <a href="profile">Profile</a>
        <a href="basket">Basket</a>
        <a href="login">Log In</a>
        <a href="about">About</a>
        <a href="contact">Contact</a>
    </nav>

    <!-- Shopping Basket -->
    <section id="shopping-basket" class="container mt-5">
        <h2>Shopping Basket</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="basket-items">
                <!-- basket items will be dynamically added here -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total:</strong></td>
                    <td id="basket-total">£0.00</td>
                </tr>
            </tfoot>
        </table>

        <form action="Paymentpage.html">
            <input type="submit" value="Continue to checkout" class="btn">
        </form>
    </section>

    <style>
        :root {
            --blue: #6c96b6;
            --darkgreen: #6a9b86;
            --lightgreen: #c8e6d1;
            --border: .1rem solid #6a9b86;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--darkgreen);
            color: var(--lightgreen);
        }

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

        /* Shopping Basket Section */

        #shopping-basket {
            background-color: var(--lightgreen);
            color: var(--darkgreen);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #shopping-basket h2 {
            color: var(--darkgreen);
        }

        .table th,
        .table td {
            color: var(--darkgreen);
        }

        .table tfoot td {
            color: var(--darkgreen);
            font-weight: bold;
        }

        .btn {
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
    </style>
</body>

</html>