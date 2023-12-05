<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/singleBookStyle.css') }}" rel="stylesheet">
    <script src="{{ asset('js/custom.js') }}"></script>
    <title>{{$book['Product_Name']}}</title>
</head>
<body>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="book-container" data-stock-level="{{ $book->Stock_Level }}" data-threshold="{{ $book->productStatus->Threshold }}">
        <div class="book-image-container">
            <img class="book-image" src="{{ $book->productImages->first() ? asset('storage/' . $book->productImages->first()->Image_URL) : asset('/images/no-image.png') }}" alt="" />
        </div>
        <div class="book-details">
            <div id="stock-message" class="stock-message"></div>
            <h2>{{$book['Product_Name']}}</h2>
            <p>{{$book['Author_Name']}}</p>
            <div class="book-description-price">
                <p class="book-description">{{$book['Description']}}</p>
                <p class="book-price">{{$book['Price']}}</p>
            </div>
            <p class="stock-status">
                {{ $book->productStatus->Stock_Status ?? 'Not Available' }} | {{ $book->Stock_Level ?? 'Not Available' }} Available
            </p>
            <form method="POST" action="{{url('addToBasket', $book->Product_ID)}}">
                @csrf
                <div class="quantity-basket">
                    <div class="quantity-box">
                        <label for="book-quantity">Quantity:</label>
                        <select id="book-quantity" name="quantityBox">
                            @for ($i = 1; $i <= $book->Stock_Level; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>   
                    <button type="submit">Add to Basket</button>
                </div>
            </form>
            @if(Auth::check() && Auth::user()->User_Type === 'Admin')
                    <a href="/book/{{$book->Product_ID}}/edit">Edit</a>
                    <form method="POST" action="/book/{{$book->Product_ID}}">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                @endif
        </div>
    </div>
</body>
</html>

