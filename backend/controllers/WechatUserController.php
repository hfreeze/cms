<?php
/**
 * Author: Bing
 * Created at: 2018-08-25T14:21:52+0800
 */

namespace backend\controllers;

use backend\actions\DeleteAction;
use backend\actions\IndexAction;
use backend\actions\SortAction;
use backend\actions\ViewAction;
use backend\models\WechatUserSearch;
use common\models\WechatUser;
use Yii;
use yii\filters\AccessControl;

/**
 * Wechat controller
 */
class WechatUserController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = Yii::createObject(WechatUserSearch::className());
                    $dataProvider = $searchModel->search(Yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => WechatUser::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => WechatUser::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => WechatUser::className(),
            ],
        ];
    }
}
