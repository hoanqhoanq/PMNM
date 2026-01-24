<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

    <h1>{{ $title }}</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>Detail</th>
        </tr>

        @foreach($products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['price'] }}</td>
            <td>
                <a href="/products/{{ $product['id'] }}">
                    <button>Chi tiết</button>
                </a>
            </td>

        </tr>
        

        @endforeach

    </table>
    <a href="{{ route('products.add') }}"> <button>Thêm sản phẩm</button></a>

</body>
</html>
