<!DOCTYPE html>
<html lang="en">

@section('content')
<div class="container">
    <h2>All Threads</h2>

    <div>
        <h3>Create New Thread</h3>
        <form method="post" action="{{ route('forum.store') }}">
            @csrf
            <div class="form-group">
                <label for="thread">Thread Name:</label>
                <input type="text" class="form-control" id="thread" name="thread" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Thread</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thread Name</th>
                <th>Description</th>
                <th>Author</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($threads as $thread)
                <tr>
                    <td>{{ $thread->id }}</td>
                    <td>{{ $thread->thread }}</td>
                    <td>{{ $thread->description }}</td>
                    <td>{{ $thread->author }}</td>
                    <td>{{ $thread->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>
<!-- resources/views/forum.blade.php -->
