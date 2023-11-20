<!-- resources/views/category/index.blade.php -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Albums</title>
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
      <a class="navbar-brand" href="/">Wedding Albums</a>
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
      @foreach($albums as $album)
        <div class="col-lg-3">
          <div class="thumbnail" style="min-height: 514px;">
            <img alt="{{$album->name}}" src="/{{$album->image}}">
            <div class="caption">
              <h3>{{$album->name}}</h3>
              <p>{{$album->description}}</p>
              <p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
</body>
</html>