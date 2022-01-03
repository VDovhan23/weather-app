<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <h2 class="text-center mb-3">{{$report->title}}</h2>

    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-danger">
            <th scope="col">Widn</th>
            <th scope="col">Visibility</th>
            <th scope="col">Sky conditions</th>
            <th scope="col">Temperature</th>
            <th scope="col">Windchill</th>
            <th scope="col">Dew Point</th>
            <th scope="col">Relative Humidity</th>
            <th scope="col">Pressure (altimeter)</th>
            <th scope="col">OB</th>
            <th scope="col">Cycle</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $report->wind }}</td>
                <td>{{ $report->visibility }}</td>
                <td>{{ $report->sky_conditions }}</td>
                <td>{{ $report->temperature }}</td>
                <td>{{ $report->windchill }}</td>
                <td>{{ $report->dew_point }}</td>
                <td>{{ $report->relative_humidity }}]</td>
                <td>{{ $report->{'pressure(altimeter)'} }}</td>
                <td>{{ $report->ob }}</td>
                <td>{{ $report->cycle }}</td>
            </tr>
        </tbody>
    </table>

</div>

</body>

</html>
