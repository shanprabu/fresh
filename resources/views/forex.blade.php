@extends('layout')
@section('title')
    {{ $title }}
@endsection

@section('content')
<h2>Forex Rates</h2>
<hr/>
<table class="table table-striped table-hover">
    <tr>
        <th>Currency Code</th><th>Currency Rate</th>
    </tr>
    @foreach($response as $forexData)
    <tr>
        <td>{{ $forexData->currency }}</td>
        <td>{{ $forexData->currencyrate }}</td>
    </tr>
    @endforeach
</table>
@endsection