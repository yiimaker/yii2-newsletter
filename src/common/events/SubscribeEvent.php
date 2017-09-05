<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\common\events;

use yii\base\Event;

/**
 * Subscribe event.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class SubscribeEvent extends Event
{
    const EVENT_AFTER_SUBSCRIBE = 'afterSubscribe';

    /**
     * @var string
     */
    public $contacts;
}
