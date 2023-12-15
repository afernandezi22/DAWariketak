<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gela</title>
</head>
<body>
    <h1>Gela</h1>
    <h2>ID: {{ $id }}</h2>
    @switch($id)
        @case('1')
            <h3>DAW</h3>
            @break
        @case('2')
            <h3>WES</h3>
            @break
        @case('3')
            <h3>WEC</h3>
            @break
        @case('4')
            <h3>EIE</h3>
            @break
        @case('5')
            <h3>DIW</h3>
            @break
        @default
            <h3>Politena</h3>
    @endswitch
</body>
</html>