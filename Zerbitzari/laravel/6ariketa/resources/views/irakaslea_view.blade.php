@extends('plantilla')
@section('title')
    Irakasleak
@endsection

@section('taula')
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Izena</th>
            <th scope="col">Abizenak</th>
            <th scope="col">Kargua</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($emaitza as $irakasle)
        <tr>
            <th scope="row">{{ $irakasle["id"] }}</th>
            <td>{{ $irakasle["izena"] }}</td>
            <td>{{ $irakasle["abizenak"] }}</td>
            <td>{{ $irakasle["kargua"] }}</td>
        </tr>
    @endforeach
    </tbody>
@endsection