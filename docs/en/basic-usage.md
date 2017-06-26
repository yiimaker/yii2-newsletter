Basic usage
===========

Frontend
--------
Functionality for subscribe.

###### 1) Configure module in frontend part of your application
```php
'modules' => [
    // ...
    'newsletter' => [
        'class' => \ymaker\newsletter\frontend\Module::class,
    ],
],
```

###### 2) Call widget for rendering of newsletter form
```php
// view file
<?= \ymaker\newsletter\frontend\widgets\NewsletterForm::widget() ?>
```

Backend
-------
Functionality for manage of users contacts.

###### 1) Configure module in backend part of your application
```php
'modules' => [
    // ...
    'newsletter' => [
        'class' => \ymaker\newsletter\backend\Module::class,
    ],
],
```
and followed by this route: `http://back.my-app.dev/newsletter/default/list`
