<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\backend;

use ymaker\newsletter\common\base\NewsletterModule;

/**
 * Newsletter backend module definition class.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class Module extends NewsletterModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ymaker\newsletter\backend\controllers';
}
