<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }} - Controle de Séries</title>

  @vite(['resources/js/app.js'])
</head>
<body class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
      <a href="{{route('series.index')}}" class="navbar-brand">Series</a>
      
      @auth
        <a href="{{ route('logout')}}">Sair</a>
      @endauth

      @guest
        <a href="{{route ('login')}}">Login</a>      
      @endguest
    </div>
  </nav>
  <h1>{{ $title }}</h1>
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @isset($message)      
    <div class="alert alert-success">
      {{ $message }}
    </div>
  @endisset
  {{ $slot }}
</body>
</html>