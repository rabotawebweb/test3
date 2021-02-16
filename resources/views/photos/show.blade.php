<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('photos') }}">photo Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('photos') }}">View All photos</a></li>
        <li><a href="{{ URL::to('photos/create') }}">Create a photo</a>
    </ul>
</nav>

<h1>Showing {{ $photo->title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $photo->title }}</h2>
        <p>
            <strong>author:</strong> {{ $photo->author }}<br>
            <strong>body:</strong> {{ $photo->body }}
        </p>
    </div>

</div>
</body>
</html>