<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h1>Thêm sản phẩm</h1>

<form method="POST" action="/products">
    @csrf

    <input type="text" name="name" placeholder="Tên sản phẩm">
    <input type="number" name="price" placeholder="Giá">

    <button type="submit">Thêm</button>
</form>

</body>
</html>
