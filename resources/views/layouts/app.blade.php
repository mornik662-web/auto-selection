<!DOCTYPE html>
<html lang="ru" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Auto selection')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

  <nav class="navbar navbar-expand-md site-header">
    <div class="container">
      <a class="navbar-brand header__brand" href="{{ route('cars.index') }}">
        <span class="header__logo">A</span>
        <span class="header__title">Auto selection</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Открыть меню">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="nav me-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('cars.index') ? 'active' : '' }}" href="{{ route('cars.index') }}">Автомобили</a>
          </li>
        </ul>
        <a href="{{ route('cars.create') }}" class="btn btn-primary">Добавить</a>
      </div>
    </div>
  </nav>

  <main class="container">
    @if (session('status'))
      <div class="alert alert-success mt-3 js-flash">{{ session('status') }}</div>
    @endif

    @yield('content')
  </main>

  <footer class="site-footer">
    <div class="container footer__inner">
      <span class="footer__author">Алфёров Никита Александрович</span>
      <div class="footer__socials">
        <a href="#" aria-label="LinkedIn" class="social-icon">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8.25h4V23h-4V8.25zM8.5 8.25h3.83v2.02h.05c.53-1 1.85-2.06 3.8-2.06 4.06 0 4.81 2.67 4.81 6.14V23h-4v-6.75c0-1.61-.03-3.68-2.24-3.68-2.25 0-2.6 1.76-2.6 3.56V23h-4V8.25z"/></svg>
        </a>
        <a href="#" aria-label="Facebook" class="social-icon">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.78-3.89 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.89h-2.34v6.99A10 10 0 0 0 22 12z"/></svg>
        </a>
        <a href="#" aria-label="Twitter" class="social-icon">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M23 4.9c-.8.36-1.66.6-2.56.71a4.48 4.48 0 0 0 1.96-2.48 8.94 8.94 0 0 1-2.83 1.08 4.46 4.46 0 0 0-7.6 4.07 12.65 12.65 0 0 1-9.19-4.66 4.46 4.46 0 0 0 1.38 5.95A4.4 4.4 0 0 1 2.14 9v.06a4.46 4.46 0 0 0 3.58 4.37 4.5 4.5 0 0 1-2.01.08 4.46 4.46 0 0 0 4.17 3.1A8.95 8.95 0 0 1 1 18.58a12.6 12.6 0 0 0 6.84 2c8.2 0 12.7-6.8 12.7-12.7 0-.19 0-.38-.02-.57A9.1 9.1 0 0 0 23 4.9z"/></svg>
        </a>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
