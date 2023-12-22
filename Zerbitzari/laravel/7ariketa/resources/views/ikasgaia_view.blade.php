@extends('plantilla')
@section('title')
    Ikasgaiak
@endsection

@section('taula')
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Izena</th>
            <th scope="col">Deskribapena</th>
            <th scope="col">Ordu kopurua</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($emaitza as $ikasgaia)
        <tr>
            <th scope="row">{{ $ikasgaia["id"] }}</th>
            <td>{{ $ikasgaia["izena"] }}</td>
            <td>{{ $ikasgaia["deskribapena"] }}</td>
            <td>{{ $ikasgaia["orduKop"] }}</td>
        </tr>
    @endforeach
    </tbody>
@endsection