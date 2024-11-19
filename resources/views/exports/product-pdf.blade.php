<!DOCTYPE html>
<html>

    <head>
        <title>Product List</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            th {
                text-align: center;
                font-weight: bold;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 2px 4px;
                text-align: left;
            }
        </style>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Unit</th>
                    <th>Type</th>
                    <th>Information</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->information }}</td>
                        <td>{{ $product->qty }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
