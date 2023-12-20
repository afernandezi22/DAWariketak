@extends('plantilla')
@section('title')
    Ikasleak
@endsection

@section('taula')
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Izena</th>
            <th scope="col">Abizenak</th>
            <th scope="col">Adina</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($emaitza as $ikasle)
        <tr>
            <th scope="row">{{ $ikasle["id"] }}</th>
            <td>{{ $ikasle["izena"] }}</td>
            <td>{{ $ikasle["abizenak"] }}</td>
            <td>{{ $ikasle["adina"] }}</td>
        </tr>
    @endforeach
    </tbody>
@endsection