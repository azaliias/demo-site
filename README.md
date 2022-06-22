# Yii 2 Basic с админ панелью

После клонирования:
------------

1. Выполнить команду composer install
2. Выполнить команду php init, выбрать среду приложения (dev, prod)
3. Запустить миграции php yii migrate/up

### База данных

Отредактировать файл `config/db.php` на свои данные, например:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8mb4',
];
```

Структура проекта
-------------------
      assets/             содержит определения используемых ресурсов
      backend/            содержит админ панель и компоненты
      commands/           содержит CLI (консольные) команды (контроллеры)
      config/             содержит конфигурация приложения
      controllers/        содержит контроллеры приложения
      environments/       содержит файлы для выбранной среды разработки
      mail/               содержит шаблоны писем
      migrations/         содержит миграции
      models/             содержит модели приложения
      runtime/            содержит файлы генерирующиеся в процессе работы приложения
      tests/              содержит различные тесты
      vendor/             содержит зависимости и пакеты сторонних разработчиков
      views/              содержит файлы представления для приложения
      web/                содержит entry point приложения (index.php) and ресурсы
