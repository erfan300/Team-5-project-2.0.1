<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/singleBookStyle.css') }}" rel="stylesheet">
    <title>{{$book['Product_Name']}}</title>
</head>
<body>
    <div class="book-container">
        <div class="book-image-container">
            <img class="book-image" src="{{asset('images/no-image.png')}}" alt="" />
        </div>
        <div class="book-details">
            <h2>{{$book['Product_Name']}}</h2>
            <p>{{$book['Author_Name']}}</p>
            <div class="book-description-price">
                <p class="book-description">{{$book['Description']}}</p>
                <p class="book-price">{{$book['Price']}}</p>
            </div>
            <div class="quantity-basket">
                <div class="quantity-box">
                    <label for="book-quantity">Quantity</label>
                    <input type="number" id="book-quantity" name="quantityBox" min="1" max="365" required>
                </div>   
                <button type="submit" id="contact-button"">ADD TO BASKET</button>
            </div>
        </div>
    </div>
    
</body>
</html>

