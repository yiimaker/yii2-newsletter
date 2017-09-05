<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\frontend\controllers;

use yii\filters\VerbFilter;
use yii\web\Controller;
use ymaker\newsletter\frontend\actions\SubscribeAction;

/**
 * Default controller for frontend newsletter module.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
       return [
           'verbs' => [
               'class' => VerbFilter::class,
               'actions' => [
                   'subscribe' => ['post'],
               ],
           ],
       ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'subscribe' => SubscribeAction::class,
        ];
    }
}
