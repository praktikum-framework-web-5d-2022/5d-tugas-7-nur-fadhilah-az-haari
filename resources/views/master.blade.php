<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <style>
        .bdr{
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
    <nav class="navbar navbar-expand-lg bg-success">
            <div class="container">
                <a class="navbar-brand text-light" href="/pelayan">
                    Seblak Maknyos
                </a>
                <form class="d-flex">
                    <a href="/pelayan" class="btn btn-outline-light me-3">Pelayan</a>
                    <a href="/pembeli" class="btn btn-outline-light">Pembeli</a>
                </form>
            </div>
    </nav>
    @yield('content')
</body>
</html>
