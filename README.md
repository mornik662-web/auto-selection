# Auto selection — ЛР №3 (Laravel 12)

Каталог автомобилей: Laravel 12, Laravel Mix, Bootstrap 5, jQuery, SQLite.

## Требования
- PHP 8.3+ (расширения gd, pdo_sqlite, sqlite3, mbstring, fileinfo)
- Composer
- Node.js 20

## Запуск
```bash
composer install
copy .env.example .env
php artisan key:generate
New-Item database\database.sqlite
php artisan migrate --seed --seeder=CarSeeder
php artisan storage:link
npm install
npm run dev
php artisan serve
```
Сайт откроется на http://127.0.0.1:8000

## Сборка стилей и скриптов
- `npm run dev` — разовая сборка
- `npm run watch` — пересборка при изменении файлов
- Исходники: `resources/sass`, `resources/js`; результат: `public/css`, `public/js`

## Функции
CRUD по автомобилям (список, просмотр, добавление, редактирование, мягкое удаление), загрузка изображений с обрезкой до 832×624, валидация на клиенте и сервере.