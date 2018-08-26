<?php
/**
 * Author: Bing
 * Created at: 2018-08-25T17:00:38+0800
 */

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%wechat_user}}".
 *
 * @property string $id
 * @property int $user_id
 * @property int $subscribe 是否订阅该公众号,为0时,代表此用户没有关注该公众号
 * @property string $openid
 * @property string $nickname
 * @property int $sex 1时是男性，值为2时是女性，值为0时是未知
 * @property string $city
 * @property string $country
 * @property string $province
 * @property string $language
 * @property string $headimgurl
 * @property int $subscribe_time 用户关注时间
 * @property string $unionid
 * @property string $remark 公众号运营者对粉丝的备注
 * @property int $groupid 用户所在的分组ID
 * @property string $tagid_list 用户被打上的标签ID列表
 * @property string $subscribe_scene 用户关注的渠道来源
 * @property string $qr_scene 二维码扫码场景
 * @property string $qr_scene_str 二维码扫码场景描述
 * @property int $created_at
 * @property int $updated_at
 */
class WechatUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wechat_user}}';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'subscribe', 'sex', 'subscribe_time', 'groupid', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['openid'], 'required'],
            [['headimgurl', 'tagid_list'], 'string'],
            [['openid', 'city', 'country', 'province', 'unionid', 'subscribe_scene'], 'string', 'max' => 100],
            [['nickname', 'remark', 'qr_scene', 'qr_scene_str'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User Id'),
            'subscribe' => Yii::t('app', 'Whether Subscribe'),
            'openid' => Yii::t('app', 'Openid'),
            'nickname' => Yii::t('app', 'Nickname'),
            'sex' => Yii::t('app', 'Sex'),
            'city' => Yii::t('app', 'City'),
            'country' => Yii::t('app', 'Country'),
            'province' => Yii::t('app', 'Province'),
            'language' => Yii::t('app', 'Language'),
            'headimgurl' => Yii::t('app', 'Headimgurl'),
            'subscribe_time' => Yii::t('app', 'Subscribe Time'),
            'unionid' => Yii::t('app', 'Unionid'),
            'remark' => Yii::t('app', 'Remark'),
            'groupid' => Yii::t('app', 'Groupid'),
            'tagid_list' => Yii::t('app', 'Tagid List'),
            'subscribe_scene' => Yii::t('app', 'Subscribe Scene'),
            'qr_scene' => Yii::t('app', 'Qr Scene'),
            'qr_scene_str' => Yii::t('app', 'Qr Scene Str'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function delete()
    {
        $this->deleted_at = time();
        $this->save();
        return true;
    }

    public static function find()
    {
        $query = parent::find();
        return $query->andWhere(['deleted_at' => null]);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
