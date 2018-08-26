<?php
/**
 * Author: Bing
 * Created at: 2018-08-25T17:05:09+0800
 */
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'openid',
        'nickname',
        [
            'attribute' => 'user_id',
            'label' => Yii::t('app', 'Username'),
            'value' => function ($model) {
                return $model->user ? $model->user->username : null;
            }
        ],
        'city',
        'country',
        'province',
        'language',
        'created_at:datetime',
        'updated_at:datetime',
    ],
]) ?>