# Yii 2 Basic с админ панелью

1. [Как развернуть проект](#title1)
2. [Структура проекта](#title2)
3. [Скрины и ссылки](#title3)

Возможности:
- Наполнение через админ. панель
- Добавление пользователей, смена пароля
- Форма обратной связи с отображением заявок в админ панели, дублированием заявок на email и в Telegram
- Яндекс карта с контактной информацией
- Скачивание отчета в .xlsx

----
## <a id="title1">Как развернуть проект</a>

1. Выполнить команду composer install
2. Создать бд `my_db`, отредактировать файл `config/db.php` на свои данные, например:
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=my_db',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8mb4',
];
```
3. Запустить миграции php yii migrate/up
4. Entry point приложения: \demo-site\web
5. Админ панель: 
http://**ссылка**/admin-login 
```Логин: admin Пароль: 123456```
6. Укажите telegram-token и id чата в `config/params.php`, параметр `tlg_token` (telegram-token) и `tlg_chat_id` (id чата)

## <a id="title2">Структура проекта</a>

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

## <a id="title3">Скрины и ссылки</a>

### Сайт
Вся текстовая информация, а также фото и координаты добавляются через админ панель


#### 1. Слайдер
[Наполнение в админ панели](https://github.com/azaliias/demo-site/blob/main/backend/controllers/SlideController.php)

![img_5.png](img_5.png)
#### 2.ФОС. Заявки сохраняются в административной панели, дублируются на почту и в телеграм

![img_11.png](img_11.png)
* [Код:Просмотр, скачивание отчета](https://github.com/azaliias/demo-site/blob/main/backend/controllers/ContactController.php)
* [Код:Отправка на почту](https://github.com/azaliias/demo-site/blob/6b937bf982fd0e31da31a2c3705ce6d01fa439fe/models/Contact.php#L78-L104)
* [Код:Отправка в телеграм](https://github.com/azaliias/demo-site/blob/main/backend/components/TelegramBot.php)
#### 3. Услуги
[Код:Наполнение в админ панели](https://github.com/azaliias/demo-site/blob/main/backend/controllers/ServiceController.php)

![img_6.png](img_6.png)
#### 4. Преимущества
[Код:Наполнение в админ панели](https://github.com/azaliias/demo-site/blob/main/backend/controllers/AdvantageController.php)

![img_8.png](img_8.png)
#### 5. Акции
[Код:Наполнение в админ панели](https://github.com/azaliias/demo-site/blob/main/backend/controllers/ActionController.php)

![img_9.png](img_9.png)
#### 6. Шаги и баннер
[Код:Наполнение в админ панели - шаги](https://github.com/azaliias/demo-site/blob/main/backend/controllers/StepController.php)
[Код:Наполнение в админ панели - баннер](https://github.com/azaliias/demo-site/blob/main/backend/controllers/SettingsController.php#L20-L28)

![img_2.png](img_2.png)
#### 7. Фотогалерея и ФОС
[Код:Наполнение в админ панели фотогалереи](https://github.com/azaliias/demo-site/blob/main/backend/controllers/PhotoController.php)
[Код:Вывод сообщений в админ панель](https://github.com/azaliias/demo-site/blob/main/backend/controllers/ContactController.php)

![img_7.png](img_7.png)
#### 8. О нас и контакты (Яндекс Карта, ФОС)

![img_12.png](img_12.png)


### **Административная панель**

#### Функционал:

#### 1. Скачивание отчета в .xlsx и выбор необходимых полей в отчете
[Код](https://github.com/azaliias/demo-site/blob/469b872b6ed2a08987b9763bc62c9348c79695f3/backend/controllers/ContactController.php#L85-L178)
![img.png](img.png)
#### 2. Логирование
[Код](https://github.com/azaliias/demo-site/blob/main/backend/controllers/LogController.php)
  
![img_1.png](img_1.png)
#### 3. Поиск по полям
[Код](https://github.com/azaliias/demo-site/blob/main/backend/views/contact/_search.php)
#### 4. Создание, редактирование, удаление записей
[Код](https://github.com/azaliias/demo-site/blob/469b872b6ed2a08987b9763bc62c9348c79695f3/backend/controllers/ActionController.php#L33-L120)
#### 5. Сортировка записей
#### 6. Смена пароля пользователя
[Код](https://github.com/azaliias/demo-site/blob/main/backend/controllers/UserController.php)
  
![img_3.png](img_3.png)
#### 7. Наполнение сайта (текстовая информация, фото)

![img_4.png](img_4.png)
![img_13.png](img_13.png)
![img_14.png](img_14.png)
