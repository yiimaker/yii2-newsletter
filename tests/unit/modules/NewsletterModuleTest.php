<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\tests\unit\modules;

use Yii;
use ymaker\newsletter\common\services\ServiceInterface;
use ymaker\newsletter\tests\unit\TestCase;
use ymaker\newsletter\common\base\NewsletterModule;

/**
 * Test case for [[NewsletterModule]] module
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class NewsletterModuleTest extends TestCase
{
    public function testInit()
    {
        new NewsletterModule('test');
        $this->assertTrue(Yii::$container->has(ServiceInterface::class));
    }
}
