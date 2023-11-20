<!-- resources/views/category/show.blade.php -->
<h1>{{ $category->name }}</h1>

<p>{{ $category->description }}</p>

<a href="{{ route('categories.edit', $category) }}" class="btn btn-secondary">Edit</a>
<form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>

<a href="{{ route('categories.index') }}" class="btn btn-primary">Back to all categories</a>