<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\backend\controllers;

use yii\web\Controller;
use ymaker\newsletter\common\services\ServiceInterface;

/**
 * Default controller for backend newsletter module.
 * 
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public $defaultAction = 'list';

    /**
     * @var ServiceInterface
     */
    protected $_service;


    /**
     * @inheritdoc
     */
    public function __construct($id, $module, ServiceInterface $service, $config = [])
    {
        $this->_service = $service;
        parent::__construct($id, $module, $config);
    }
    
    /**
     * Renders clients list
     *
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'dataProvider' => $this->_service->getDataProvider(),
        ]);
    }
}
