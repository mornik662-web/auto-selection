<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Auto selection')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

  <header class="site-header">
    <div class="container d-flex align-items-center justify-content-between py-3">
      <a href="{{ route('cars.index') }}" class="d-flex align-items-center gap-2 text-decoration-none">
        <span class="header__logo">A</span>
        <span class="header__title">Auto selection</span>
      </a>
      <a class="btn btn-primary" href="{{ route('cars.create') }}">Добавить</a>
    </div>
  </header>

  <main class="container pb-4">
    @if (session('status'))
      <div class="alert alert-success mt-3">{{ session('status') }}</div>
    @endif

    @yield('content')
  </main>

  <footer class="site-footer mt-5">
    <div class="container py-3">
      <span class="footer__author">Алфёров Никита Александрович</span>
    </div>
  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>