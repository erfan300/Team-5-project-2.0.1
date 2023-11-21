<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/createStyle.css') }}" rel="stylesheet">
    <title>Add Book to Database</title>
</head>
<body>
    <section class="form-section">
        <form action="/store" method="POST" class="book-form">
            @csrf
            <div class="form-group">
                <label for="Product_Name">Book Name</label>
                <input type="text" name="Product_Name" class="form-control" required/>
                @error('Product_Name')
                    <p class="product-name-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="Description" rows="5" class="form-control"></textarea>
                @error('Description')
                    <p class="description-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="number" name="Price" step="0.01" class="form-control" required/>
                @error('Price')
                    <p class="price-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Stock_Level">Stock Level</label>
                <input type="number" name="Stock_Level" class="form-control" required/>
                @error('Stock_Level')
                    <p class="stock-level-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Author_Name">Author Name</label>
                <input type="text" name="Author_Name" class="form-control" required/>
                @error('Author_Name')
                    <p class="author-name-error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="book-image">Book Cover</label>
                <input type="file" name="bookImage" class="form-control"/>
                @error('bookImage')
                    <p class="book-image-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Book_Type">Book Type</label>
                <select name="Book_Type" class="form-control" required>
                    <option value="" selected disabled>Select Book Type</option>
                    <option value="Hardback">Hardback</option>
                    <option value="Paperback">Paperback</option>
                </select>
                @error('Book_Type')
                    <p class="book-type-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Book_Genre">Book Genre</label>
                <select name="Book_Genre" class="form-control" required>
                    <option value="" selected disabled>Select Book Genre</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-fiction">Non-fiction</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Historical">Historical</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Romance">Romance</option>
                    <option value="Young Adult">Young Adult</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Children">Children</option>
                    <option value="Biography">Biography</option>
                    <option value="Adventure">Adventure</option>
                    <option value="True Crime">True Crime</option>
                    <option value="Horror">Horror</option>
                </select>
                @error('Book_Genre')
                    <p class="book-genre-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Category_ID">Category Name</label>
                <select name="Category_ID" class="form-control">
                    <option value="" selected disabled>Select Category Name</option>
                    <option value="1">General</option> <!-- Makes book Category_ID = 1 -->
                    <option value="2">Best Sellers</option> <!-- Makes book Category_ID = 2 -->
                    <option value="3">New Books</option> <!-- Makes book Category_ID = 3 -->
                    <option value="4">Classics</option> <!-- Makes book Category_ID = 4 -->
                    <option value="5">Recommended</option> <!-- Makes book Category_ID = 5 -->
                    <option value="6">Books For Children</option> <!-- Makes book Category_ID = 6 -->
                    <option value="7">Books For Young Adults</option> <!-- Makes book Category_ID = 7 -->
                    <option value="8">Historical Period</option> <!-- Makes book Category_ID = 8 -->
                </select>
                @error('Category_ID')
                    <p class="category-name-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn-submit">Add Book</button>
                <a href="/" class="btn-back">Back</a>
            </div>
        </form>
                
    </section>
    
</body>
</html>
