<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirolari bista</title>
</head>
<body>
    <h1>Kirolari bista</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Izena</th>
            <th>Abizena</th>
        </tr>
        @foreach($emaitza as $kirolari)
            <tr>
                <td>$kirolari -> id</td>
                <td>$kirolari -> izena</td>
                <td>$kirolari -> abizena</td>
            </tr>
        @endforeach

    </table>
</body>
</html>