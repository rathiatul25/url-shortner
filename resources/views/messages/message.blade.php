@if(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
@endif

@if(Session::has('failure'))
    <p class="alert alert-danger">{{ Session::get('failure') }}</p>
@endif