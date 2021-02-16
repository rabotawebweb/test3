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

<h1>Edit {{ $photo->title }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($photo, array('route' => array('photos.update', $photo->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('author', 'author') }}
        {{ Form::text('author', null, array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Edit the photo!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>