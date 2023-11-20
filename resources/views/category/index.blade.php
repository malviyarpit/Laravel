<!-- resources/views/category/index.blade.php -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Wedding Shop</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    <style>
      body {
        padding-top: 50px;
      }
      .starter-template {
        padding: 40px 15px;
      text-align: center;
      }
    </style>
  </head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
      <button type="button" class="navbar-toggle"data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Wedding Shop</a>
      <p style="text-align:right; padding-top: 5px;"><a href="{{ route('login') }}" class="btn btn-big btn-default">Login</a>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">    
    <div class="starter-template">  
    <div class="row">
      @foreach($categories as $category)
        <div class="col-lg-3">
          <div class="thumbnail" style="min-height: 514px;">
            <img alt="{{$category->name}}" src="/{{$category->image}}">
            <div class="caption">
              <h3>{{$category->name}}</h3>
              <p>{{$category->description}}</p>
              <p>{{$category->slug}}</p>
              <p>Created date:  {{ date("d F Y",strtotime($category->created_at)) }} at {{date("g:ha",strtotime($category->created_at)) }}</p>
              <p><a href="{{ route('albums.index', $category) }}" class="btn btn-big btn-default">View</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- /.container -->
</div>



<!-- <table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.show', $category) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> -->
</body>
</html>