<!-- resources/views/categories/edit.blade.php -->
<h1>Edit Category</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" rows="4" required>{{ $category->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>