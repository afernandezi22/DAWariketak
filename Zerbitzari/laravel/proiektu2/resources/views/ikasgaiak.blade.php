@extends('plantilla')
@section('title')
    Ikasgaiak
@endsection

@section('taula')
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Izena</th>
            <th scope="col">Ordu kopurua</th>
        </tr>
    </thead>
    <tbody>

    @if(isset($letra))
        @foreach($ikasgaiak as $ikasgai => $value)    
            @if(strtolower(substr($ikasgai, 0, 1)) == strtolower($letra))
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $ikasgai }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endif
        @endforeach
    @else
        @foreach($ikasgaiak as $ikasgai => $value)    
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $ikasgai }}</td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
@endsection