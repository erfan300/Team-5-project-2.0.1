<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
    <title>Homepage</title>
</head>
<body>
    
    <!-- Header -->
    <section class="header">
        <nav>
            <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
            </ul>
        </nav>  
    </section>

    <!-- SlideShow -->
    <section class="slideShow">

    </section>


    <h1><u>HOME</u></h1>
    
    <p>Fill in the blanks with the names of your pages.</p>
    <p>Greetings and welcome to the X webpage, where I will be offering books in a variety of genres. We are the top sellers of specialized books that you won't find anywhere else.</p>
    
    <!-- Book Selection -->
    <section class="book-categories">
        <p><u>BEST SELLERS</u></p>
        <div class="book-category">
            <div class="book-genre-container">
        
                @if(count($books) == 0)
                    <p> No Books found </p>
                @endif
         
                @foreach($books as $book)
                    <div class="book-container">
                        <img class="book-image" src="{{asset('images/no-image.png')}}" alt="" />
                        <div>
                            <h3 class="book-title">
                                <a href="/book/{{$book['Product_ID']}}"> {{$book->Product_Name}} </a>
                            </h3>
                            <div class="book-author">{{$book->Author_Name}}</div>
                            <div class="book-price">{{$book->Price}}</div>
                            <div class="book-type">{{$book->Book_Type}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <p><u>NEW IN</u></p>
            <img src="Image/BLANK.PNG" alt="New In 1" title="New In 1">
            <img src="Image/BLANK.PNG" alt="New In 2" title="New In 2">
            <img src="Image/BLANK.PNG" alt="New In 3" title="New In 3">
            <img src="Image/BLANK.PNG" alt="New In 4" title="New In 4">
        <p><u>GENRES</u></p>
            <img src="Image/BLANK.PNG" alt="Genre 1" title="Genre 1">
            <img src="Image/BLANK.PNG" alt="Genre 2" title="Genre 2">
            <img src="Image/BLANK.PNG" alt="Genre 3" title="Genre 3">
            <img src="Image/BLANK.PNG" alt="Genre 4" title="Genre 4">
    </section>
    
    <!-- Footer -->
    <section class="footer">
        <h6>Book4U 2023</h6>
    </section>
</body>
</html>
