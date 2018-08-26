<?php
/**
 * Author: Bing
 * Created at: 2018-08-25T17:01:38+0800
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WechatUser;

/**
 * WechatUserSearch represents the model behind the search form about `common\models\WechatUser`.
 */
class WechatUserSearch extends WechatUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'subscribe', 'sex', 'subscribe_time', 'groupid', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['openid', 'nickname', 'city', 'country', 'province', 'language', 'headimgurl', 'unionid', 'remark', 'tagid_list', 'subscribe_scene', 'qr_scene', 'qr_scene_str'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WechatUser::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'subscribe' => $this->subscribe,
            'sex' => $this->sex,
            'subscribe_time' => $this->subscribe_time,
            'groupid' => $this->groupid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'openid', $this->openid])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'headimgurl', $this->headimgurl])
            ->andFilterWhere(['like', 'unionid', $this->unionid])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'tagid_list', $this->tagid_list])
            ->andFilterWhere(['like', 'subscribe_scene', $this->subscribe_scene])
            ->andFilterWhere(['like', 'qr_scene', $this->qr_scene])
            ->andFilterWhere(['like', 'qr_scene_str', $this->qr_scene_str]);

        return $dataProvider;
    }
}
