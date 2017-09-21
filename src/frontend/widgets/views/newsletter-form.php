<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * View file for NewsletterForm widget.
 *
 * @var \yii\web\View $this
 * @var \ymaker\newsletter\common\models\entities\NewsletterClient $model
 * 
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */

\yii\bootstrap\BootstrapAsset::register($this);

$form = ActiveForm::begin([
    'action' => ['/newsletter/default/subscribe'],
    'options' => ['class' => 'form-inline'],
]);

echo $form->field($model, 'contacts')
    ->textInput(['placeholder' => $model->getAttributeLabel('contacts')])
    ->label(false);

echo Html::submitButton(Yii::t('front/newsletter', 'Subscribe'), [
    'class' => 'btn btn-success',
]);

ActiveForm::end();
