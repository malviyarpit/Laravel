<!-- resources/views/category/create.blade.php -->
<h1>Create Category</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="content">Description</label>
        <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>