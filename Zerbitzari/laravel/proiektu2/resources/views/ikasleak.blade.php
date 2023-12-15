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

    @if(isset($adina))
        @foreach($ikasleak as $ikasle)    
            @if($ikasle["adina"]>=$adina)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $ikasle["izena"] }}</td>
                    <td>{{ $ikasle["adina"] }}</td>
                </tr>
            @endif
        @endforeach
    @else
        @foreach ($ikasleak as $ikasle)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $ikasle["izena"] }}</td>
                <td>{{ $ikasle["adina"] }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
@endsection