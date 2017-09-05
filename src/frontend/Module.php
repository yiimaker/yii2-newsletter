<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\frontend;

use ymaker\newsletter\common\base\NewsletterModule;

/**
 * Newsletter frontend module definition class.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class Module extends NewsletterModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ymaker\newsletter\frontend\controllers';
}
