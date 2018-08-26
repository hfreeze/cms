<?php

use yii\db\Schema;
use yii\db\Migration;

class m180825_070250_wechat_user extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=MyISAM';

        $this->createTable(
            '{{%wechat_user}}',
            [
                'id'=> $this->primaryKey(11)->unsigned(),
                'user_id'=> $this->integer(11)->null()->defaultValue(null),
                'subscribe'=> $this->integer(5)->null()->defaultValue(null)->comment('是否订阅该公众号,为0时,代表此用户没有关注该公众号'),
                'openid'=> $this->string(100)->notNull(),
                'nickname'=> $this->string(255)->null()->defaultValue(null),
                'sex'=> $this->integer(5)->null()->defaultValue(null)->comment('1时是男性，值为2时是女性，值为0时是未知'),
                'city'=> $this->string(100)->null()->defaultValue(null),
                'country'=> $this->string(100)->null()->defaultValue(null),
                'province'=> $this->string(100)->null()->defaultValue(null),
                'language'=> $this->string(50)->null()->defaultValue(null),
                'headimgurl'=> $this->text()->null()->defaultValue(null),
                'subscribe_time'=> $this->integer(11)->null()->defaultValue(null)->comment('用户关注时间'),
                'unionid'=> $this->string(100)->null()->defaultValue(null),
                'remark'=> $this->string(255)->null()->defaultValue(null)->comment('公众号运营者对粉丝的备注'),
                'groupid'=> $this->integer(11)->null()->defaultValue(null)->comment('用户所在的分组ID'),
                'tagid_list'=> $this->text()->null()->defaultValue(null)->comment('用户被打上的标签ID列表'),
                'subscribe_scene'=> $this->string(100)->null()->defaultValue(null)->comment('用户关注的渠道来源'),
                'qr_scene'=> $this->string(255)->null()->defaultValue(null)->comment('二维码扫码场景'),
                'qr_scene_str'=> $this->string(255)->null()->defaultValue(null)->comment('二维码扫码场景描述'),
                'created_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
                'deleted_at'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('openid','{{%wechat_user}}',['openid'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('openid', '{{%wechat_user}}');
        $this->dropTable('{{%wechat_user}}');
    }
}
