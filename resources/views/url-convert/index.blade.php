@include('layout.header')
<h2>Top 100 board with the most frequently accessed URLs</h2>
@if(count($urls) > 0)
    <table border="0" width="60%" cellpadding="0" cellspacing="0" class="table table-striped">
        <tr>
            <th>Long Url</th>
            <th>Converted Url</th>
        </tr>
        @foreach($urls as $url)
            <tr>
                <td>{{ $url->long_url }}</td>
                <td><a href="{{ config('app.host_name').'/'.$url->short_url }}">{{ config('app.host_name').'/'.$url->short_url }}</a></td>
            </tr>
        @endforeach
    </table>
    {{ $urls->links() }}
@else
    <p>No record found</p>
@endif