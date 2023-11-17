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
        <form action="#" method="POST" class="book-form">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" name="productName" class="form-control" required/>
            </div>
        
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" rows="5" class="form-control"></textarea>
            </div>
        
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" step="0.01" class="form-control" required/>
            </div>
        
            <div class="form-group">
                <label for="stockLevel">Stock Level</label>
                <input type="number" name="stockLevel" class="form-control" required/>
            </div>
        
            <div class="form-group">
                <label for="authorName">Author Name</label>
                <input type="text" name="authorName" class="form-control" required/>
            </div>
        
            <div class="form-group">
                <label for="bookType">Book Type</label>
                <select name="bookType" class="form-control" required>
                    <option value="Hardback">Hardback</option>
                    <option value="Paperback">Paperback</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="bookGenre">Book Genre</label>
                <select name="bookGenre" class="form-control" required>
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
            </div>
        
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <select name="categoryName" class="form-control" required>
                    <option value="General">General</option>
                    <option value="Best Sellers">Best Sellers</option>
                    <option value="New Books">New Books</option>
                    <option value="Classics">Classics</option>
                    <option value="Recommended">Recommended</option>
                    <option value="Books For Children">Books For Children</option>
                    <option value="Books For Young Adults">Books For Young Adults</option>
                    <option value="Historical Period">Historical Period</option>
                </select>
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn-submit">Add Book</button>
                <a href="/" class="btn-back">Back</a>
            </div>
        </form>
                
    </section>
    
</body>
</html>
