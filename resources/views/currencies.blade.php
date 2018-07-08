<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Popular currencies</title>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 100;
        }
    </style>
</head>
<body>
<div>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Short name</th>
            <th>Actual course</th>
            <th>Actual course date</th>
            <th>Active</th>
        </tr>
        @foreach($currencies as $currency)
            <tr>
                <td>{{ $currency['id'] }}</td>
                <td>{{ $currency['name'] }}</td>
                <td>{{ $currency['short_name'] }}</td>
                <td>{{ $currency['actual_course'] }}</td>
                <td>{{ $currency['actual_course_date'] }}</td>
                <td>{{ $currency['active'] ? 'True': 'False' }}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
