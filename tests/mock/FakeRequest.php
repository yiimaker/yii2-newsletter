<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\tests\mock;

use yii\web\Request;

/**
 * Feke request component for mock in tests
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class FakeRequest extends Request
{
    /**
     * @inheritdoc
     */
    public function getIsPost()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function post($name = null, $defaultValue = null)
    {
        return [
            'NewsletterClient' => ['contacts' => 'test@action.com'],
        ];
    }
}
