@extends('plantilla')
@section('title')
    Ikasleak
@endsection

@section('taula')
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Izena</th>
            <th scope="col">Adina</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($ikasleak as $ikasle)
        <!-- {{ $zbk = 1; }} -->
        <tr>
            <th scope="row">1</th>
            <td>{{ $ikasle["izena"] }}</td>
            <td>{{ $ikasle["adina"] }}</td>
        </tr>
        <!-- {{ $zbk++; }} -->
    @endforeach

    </tbody>
@endsection