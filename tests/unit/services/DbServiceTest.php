<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\tests\unit\services;

use ymaker\newsletter\common\models\entities\NewsletterClient;
use ymaker\newsletter\common\services\DbService;
use ymaker\newsletter\common\services\ServiceInterface;
use ymaker\newsletter\tests\unit\TestCase;

/**
 * Test case for database service
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class DbServiceTest extends TestCase
{
    /**
     * @var DbService
     */
    private $_service;


    /**
     * @inheritdoc
     */
    protected function _before()
    {
        parent::_before();
        $this->_service = new DbService();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf(ServiceInterface::class, $this->_service);
    }

    public function testCreate()
    {
        $data = [
            'NewsletterClient' => [
                'contacts' => 'test@example.com'
            ],
        ];

        $res = $this->_service->create($data);

        $this->assertTrue($res);
        $this->tester->seeRecord(NewsletterClient::class, [
            'contacts' => 'test@example.com'
        ]);
    }

    public function testDefaultMode()
    {
        $this->assertEquals(DbService::MODE_EMAIL, $this->_service->mode);
    }
}
