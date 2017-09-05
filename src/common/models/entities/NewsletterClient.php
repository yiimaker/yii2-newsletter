<?php
/**
 * @link https://github.com/yiimaker/yii2-newsletter
 * @copyright Copyright (c) 2017 Yii Maker
 * @license BSD 3-Clause License
 */

namespace ymaker\newsletter\common\models\entities;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%newsletter_client}}".
 *
 * @property int $id
 * @property string $contacts
 * @property int $created_at
 * @property int $updated_at
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class NewsletterClient extends ActiveRecord
{
    const SCENARIO_CONTACTS_EMAIL = 'contactsEmail';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%newsletter_client}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => TimestampBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['contacts', 'required'],
            ['contacts', 'string', 'max' => 255],
            ['contacts', 'email', 'on' => self::SCENARIO_CONTACTS_EMAIL],

            [['created_at', 'updated_at'], 'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => Yii::t('newsletter/entity', 'ID'),
            'contacts'      => Yii::t('newsletter/entity', 'Contacts'),
            'created_at'    => Yii::t('newsletter/entity', 'Created at'),
            'updated_at'    => Yii::t('newsletter/entity', 'Updated at'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
            self::SCENARIO_CONTACTS_EMAIL => self::OP_ALL,
        ];
    }
}
