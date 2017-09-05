<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\frontend\widgets;

use yii\base\Widget;
use ymaker\newsletter\common\models\entities\NewsletterClient;

/**
 * Renders newsletter form.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class NewsletterForm extends Widget
{
    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('newsletter-form', [
            'model' => new NewsletterClient(),
        ]);
    }
}
