<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\tests\unit\actions;

use Yii;
use ymaker\newsletter\common\models\entities\NewsletterClient;
use ymaker\newsletter\common\services\DbService;
use ymaker\newsletter\common\services\ServiceInterface;
use ymaker\newsletter\frontend\actions\SubscribeAction;
use ymaker\newsletter\tests\unit\TestCase;

/**
 * Test case for [[NewsletterModule]] action
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class SubscribeActionTest extends TestCase
{
    public function testRun()
    {
        Yii::$container->set(ServiceInterface::class, DbService::class);
        (new SubscribeAction(null, null))->run();

        $this->tester->seeRecord(NewsletterClient::class, [
            'contacts' => 'test@action.com',
        ]);
    }
}
