<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate data</title>
</head>
<body>
    <center>
        <h5>
            Generate Data PDF
        </h5>
        <table class="table table-bordered">    
            <img src="data:image/svg+xml;base64, {{ base64_encode(QrCode::size(400)->generate($newData['id'])) }} ">
        </table>

        <table>
            <thead>

                <tr>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $newData['firstname'] }}</td>
                    <td>{{ $newData['lastname'] }}</td>
                    <td>{{ $newData['phone']['number'] }}</td>
                </tr>
            </tbody>
        </table>
    </center>
</body>
</html>