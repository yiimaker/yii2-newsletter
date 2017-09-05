<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\common\base;

use Yii;
use ymaker\newsletter\common\services\DbService;
use ymaker\newsletter\common\services\ServiceInterface;

/**
 * Base newsletter module.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class NewsletterModule extends \yii\base\Module
{
    /**
     * Configuration of service.
     *
     * @var array
     */
    private $_service = null;


    /**
     * Setter for service
     *
     * @param array $service
     */
    public function setService(array $service)
    {
        $this->_service = $service;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->_service === null) {
            $this->_service = ['class' => DbService::class];
        }

        Yii::$container->set(ServiceInterface::class, $this->_service);
    }
}
