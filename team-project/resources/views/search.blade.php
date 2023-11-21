<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
    <title>Search Books | Book4U</title>
</head>
<body>
    <div class="search-book-container">
        @if(count($books) == 0)
            <p> No Books found </p>
        @endif
        @foreach($books as $book)
            <x-book-card :book="$book"/>
        @endforeach
    </div>
</body>
</html>

