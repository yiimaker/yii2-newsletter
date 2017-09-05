<?php
use yii\grid\GridView;
use yii\grid\SerialColumn;

/**
 * View file for default controller in backend newsletter module.
 *
 * @var \yii\web\View $this
 * @var \yii\data\ActiveDataProvider $dataProvider
 * 
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */

\yii\bootstrap\BootstrapAsset::register($this);
?>
<div class="container">
    <div class="col-md-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => SerialColumn::class],
                'contacts',
                'created_at:datetime',
            ],
        ]) ?>
    </div>
</div>
