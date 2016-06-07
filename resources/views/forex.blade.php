<!doctype HTML>
<html>
    <head>
        <title>Forex Rates</title>
    </head>
    <body>
        <table>
            <tr>
                <td>Currency Code</td><td>Currency Rate</td>
            </tr>
            @foreach($response as $forexData)
            <tr>
                <td>{{ $forexData->currency }}</td>
                <td>{{ $forexData->currencyrate }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>