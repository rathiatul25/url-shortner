<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">URL Shortner</a>
        </div>
        <ul class="nav navbar-nav">
            <li @if(Request::path() == '/') class="active" @endif><a href="{{ URL::to('/') }}">List</a></li>
            <li @if(Request::path() == 'url-convert') class="active" @endif><a href="{{ URL::to('url-convert') }}">Create</a></li>
        </ul>
    </div>
</nav>

@include('messages.message')