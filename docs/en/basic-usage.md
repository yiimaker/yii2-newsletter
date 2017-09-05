Basic usage
===========

Frontend
--------
Functionality for subscribe

1. Configure module in frontend part of your application
    ```php
    'modules' => [
        // ...
        'newsletter' \ymaker\newsletter\frontend\Module::class,
    ],
    ```

2. Call widget for rendering of newsletter form
    ```php
    // view file
    <?= \ymaker\newsletter\frontend\widgets\NewsletterForm::widget() ?>
    ```

Backend
-------
Functionality for manage of users contacts

1. Configure module in backend part of your application
    ```php
    'modules' => [
        // ...
        'newsletter' => \ymaker\newsletter\backend\Module::class,
    ],
    ```
2. And followed by this route: `http://your-app.back.dev/newsletter/default/list`
