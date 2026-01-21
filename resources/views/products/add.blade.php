<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Thêm sản phẩm</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Thêm mới sản phẩm</h1>
        <form>
            <div>
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="price">Giá:</label>
                <input type="number" id="price" name="price" required>
            </div>
            <div>
                <button type="submit">Thêm sản phẩm</button>
                <a href="/product"><button type="button">Quay lại</button></a>
            </div>
        </form>
    </body>
</html>