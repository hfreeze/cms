<?php
/**
 * Author: Bing
 * Created at: 2018-08-25T17:05:09+0800
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\UserSearch
 */
use backend\grid\DateColumn;
use backend\grid\GridView;
use backend\widgets\Bar;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;

$this->title = 'Wechat Users';
$this->params['breadcrumbs'][] = Yii::t('app', 'Wechat Users');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'template' => '{refresh} {delete}',
                ]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => "{items}\n{pager}",
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'openid',
                        ],
                        [
                            'attribute' => 'nickname',
                        ],
                        [
                            'attribute' => 'user_id',
                            'label' => Yii::t('app', 'Username'),
                            'value' => function ($model) {
                                return $model->user ? $model->user->username : null;
                            }
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'created_at',
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'updated_at',
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'width' => '190px',
                            'template' => '{view-layer} {delete}',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>