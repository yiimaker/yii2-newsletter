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
    public $service = null;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->service === null) {
            $this->service = [
                'class' => DbService::class,
            ];
        }

        Yii::$container->set(ServiceInterface::class, $this->service);
    }
}
