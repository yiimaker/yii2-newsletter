Базовое использование
=====================

Frontend
--------
Функционал для подписки.

###### 1) Настройте модуль в frontend части вашего приложения
```php
'modules' => [
    // ...
    'newsletter' => [
        'class' => \ymaker\newsletter\frontend\Module::class,
    ],
],
```

###### 2) Вызовите виджет для рендеринга формы для подписки в файле вида
```php
// файл вида
<?= \ymaker\newsletter\frontend\widgets\NewsletterForm::widget() ?>
```

Backend
-------
Функционал для управления контактами пользователей.

###### 1) Настройте модуль в backend части вашего приложения
```php
'modules' => [
    // ...
    'newsletter' => [
        'class' => \ymaker\newsletter\backend\Module::class,
    ],
],
```
затем следуйте по данному пути: `http://back.my-app.dev/newsletter/default/list`
