@include('dashboard.payment_method.menu')

<table>
    <th>Method</th>
    <th>Address</th>

        <tr>
            <td>{{ $method->method }}</td>
            <td>{{ $method->address }}</td>
        </tr>

</table>
