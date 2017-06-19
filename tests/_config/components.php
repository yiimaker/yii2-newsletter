<?php
return [
    'db' => require (__DIR__ . '/db.php'),

    'request' => \ymaker\newsletter\tests\mock\FakeRequest::class,
    'response' => \yii\web\Response::class,
];