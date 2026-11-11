<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Тест Mix</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container py-5">
    <h1>Mix работает</h1>
    <button class="btn btn-primary" id="test-btn">Нажми меня</button>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    document.getElementById('test-btn').addEventListener('click', function () {
      alert('jQuery ' + $.fn.jquery + ', Bootstrap ' + bootstrap.Tooltip.VERSION);
    });
  </script>
</body>
</html>