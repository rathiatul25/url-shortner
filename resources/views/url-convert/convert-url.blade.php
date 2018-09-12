@include('layout.header')

{!! Form::open(['url' => URL::to('url-convert'), 'method' => 'POST']) !!}
    <div class="form-group">
        <label for="url" class="col-sm-2 col-form-label">Enter URL</label>
        <div class="col-sm-5">

        {!! Form::text('url_value', null, ['required', 'class' => 'form-control']) !!}
        </div>
    </div>
{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

