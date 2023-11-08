@props(['book'])

<div class="book-container"><a href="/book/{{$book['Product_ID']}}">
    <img class="book-image" src="{{asset('images/no-image.png')}}" alt="" />
    <div>
        <h3 class="book-title">
            <a href="/book/{{$book['Product_ID']}}"> {{$book->Product_Name}} </a>
        </h3>
        <div class="book-author">{{$book->Author_Name}}</div>
        <div class="book-price">{{$book->Price}}</div>
        <div class="book-type">{{$book->Book_Type}}</div>
    </div>
</div></a>