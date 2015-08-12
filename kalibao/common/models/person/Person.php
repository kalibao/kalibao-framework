<?php
/**
* @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
* @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
*/

namespace kalibao\common\models\person;

use Yii;
use yii\behaviors\TimestampBehavior;
use kalibao\common\models\user\User;
use kalibao\common\models\language\Language;
use kalibao\common\models\language\LanguageI18n;
use kalibao\common\models\mailSendingRole\MailSendingRole;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $default_language
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MailSendingRole[] $mailSendingRoles
 * @property User $user
 * @property Language $defaultLanguage
 * @property LanguageI18n[] $languageI18ns
 *
 * @package kalibao\common\models\person
 * @version 1.0.1
 * @author Kevin Walter <walkev13@gmail.com>
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => function ($event) {
                    return date('Y-m-d h:i:s');
                },
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'insert' => ['first_name', 'last_name', 'email', 'default_language'],
            'update' => ['first_name', 'last_name', 'email', 'default_language'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'default_language'], 'required'],
            [['user_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['email'], 'email', 'checkDNS' => true],
            [['default_language'], 'string', 'max' => 16],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('kalibao','model:id'),
            'first_name' => Yii::t('kalibao','person:first_name'),
            'last_name' => Yii::t('kalibao','person:last_name'),
            'email' => Yii::t('kalibao','person:email'),
            'default_language' => Yii::t('kalibao','person:default_language'),
            'user_id' => Yii::t('kalibao','person:user_id'),
            'created_at' => Yii::t('kalibao','model:created_at'),
            'updated_at' => Yii::t('kalibao','model:updated_at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMailSendingRoles()
    {
        return $this->hasMany(MailSendingRole::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefaultLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'default_language']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageI18ns()
    {
        return $this->hasMany(LanguageI18n::className(), ['language_id' => 'default_language']);
    }
}
