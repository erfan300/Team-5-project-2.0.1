@props(['book'])

<div class="book-container">
    <a href="{{ url('/book/' . $book->Product_ID) }}">
        <img class="book-image" src="{{ $book->productImages->first() ? asset('storage/' . $book->productImages->first()->Image_URL) : asset('/images/no-image.png') }}" alt="" />
        <div>
            <h3 class="book-title">
                <a href="{{ url('/book/' . $book->Product_ID) }}">{{ $book->Product_Name }}</a>
            </h3>
            <div class="book-author">
                <a href="{{ url('/search/?author=' . urlencode($book->Author_Name)) }}">{{ $book->Author_Name }}</a>
            </div>
            <div class="book-price">{{ $book->Price }}</div>
            <div class="book-type">{{ $book->Book_Type }}</div>
        </div>
    </a>
</div>
