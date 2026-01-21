<!DOCTYPE html>
<html>
<head>
    <title>Bàn cờ vua</title>
    <style>
        td { width: 50px; height: 50px; }
        .w { background:rgb(255, 255, 255); }
        .b { background:rgb(0, 0, 0); }
    </style>
</head>
<body>
    <h1>Bàn cờ {{ $n }}x{{ $n }}</h1>
    <table border="1">
        @for($i = 0; $i < $n; $i++)
        <tr>
            @for($j = 0; $j < $n; $j++)
            <td class="{{ ($i + $j) % 2 == 0 ? 'w' : 'b' }}"></td>
            @endfor
        </tr>
        @endfor
    </table>
    <br>
    <a href="/"><button>Quay về trang chủ</button></a>
</body>
</html>