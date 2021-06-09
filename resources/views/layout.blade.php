<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de séries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-2">
        <div class="container-fluid justify-content-between">
          <a class="navbar-brand" href="/series">Home</a>
          @auth
          <a href="/sair" class="text-danger">Sair</a>    
          @endauth

          @guest
          <a href="/sair" class="text-primary">Entrar</a>   
          @endguest
        </div>
      </nav>
    <div class="container">
        <div class="jumbotron">
            <h1>@yield('cabecalho')</h1>
        </div>

        @yield('conteudo')
    </div>
    <script src="https://kit.fontawesome.com/b763dd609a.js" crossorigin="anonymous"></script>
</body>
</html>