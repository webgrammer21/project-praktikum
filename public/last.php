<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
        background: url(../assets/img/bread.jpg) no-repeat;
        background-position: center;
        background-size: cover;
    }
        .container{
            align-items: center;
            display: flex;
            justify-content: center;
            height: 100vh;
        }
        
        .card{
            align-items: center;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(18px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color : #ffff;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="card">
        <div class="card-body">
            <h1 class="card-title" style="color:#d3a261;">Terimakasih Atas Pesanan Anda</h1>
            <h2 class="card-title" style="color:#d3a261;">Selamat Menikmati</h2>
            <p class="card-text">Semoga yang beli menjadi alpha sigma male</p>
        </div>
        <div class="card-body">
            <a href="../" class="card-link btn btn-warning">Balik Keberanda</a>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>