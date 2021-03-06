<?php
/**
 * @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
 * @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
 */

namespace kalibao\backend\modules\mail\models\mailSendRole\crud;

use Yii;
use yii\data\ActiveDataProvider;
use kalibao\common\components\crud\ModelFilterInterface;
use kalibao\common\models\mailSendRole\MailSendRole;

/**
 * This is the model filter class for controller "MailSendRole".
 *
 * @property integer $id
 * @property string $mail_send_role_i18n_title
 * @property string $created_at_start
 * @property string $created_at_end
 * @property string $updated_at_start
 * @property string $updated_at_end
 *
 * @package kalibao\backend\modules\mail\models\mailSendRole\crud
 * @version 1.0
 * @author Kevin Walter <walkev13@gmail.com>
 */
class ModelFilter extends MailSendRole implements ModelFilterInterface
{
    public $mail_send_role_i18n_title;
    public $created_at_start;
    public $created_at_end;
    public $updated_at_start;
    public $updated_at_end;

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => [
                'id', 'mail_send_role_i18n_title', 'created_at_start', 'created_at_end', 'updated_at_start', 'updated_at_end'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['created_at_start', 'created_at_end', 'updated_at_start', 'updated_at_end'], 'date', 'format' => 'yyyy-MM-dd'],
            [['mail_send_role_i18n_title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function search($requestParams, $language = null, $pageSize = 10)
    {
        $query = self::find();

        $query->joinWith([
            'mailSendRoleI18ns' => function ($query) use ($language) {
                $query->select(['mail_send_role_id', 'title'])->onCondition(['mail_send_role_i18n.i18n_id' => $language]);
            },
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'id',
                    'mail_send_role_i18n_title' => [
                        'asc' => ['mail_send_role_i18n.title' => SORT_ASC],
                        'desc' => ['mail_send_role_i18n.title' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                    'created_at',
                    'updated_at',
                ],
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ],
            'pagination' => [
                'defaultPageSize' => $pageSize,
                'pageSize' => $pageSize,
            ]
        ]);

        $this->load($requestParams);

        if (! $this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['>=', 'mail_send_role.created_at', $this->created_at_start]);
        if ($this->created_at_end != '') {
            $query->andWhere([
                '<=',
                'mail_send_role.created_at',
                (new \DateTime($this->created_at_end))->modify('+1 day')->format('Y-m-d')
            ]);
        }
        $query->andFilterWhere(['>=', 'mail_send_role.updated_at', $this->updated_at_start]);
        if ($this->updated_at_end != '') {
            $query->andWhere([
                '<=',
                'mail_send_role.updated_at',
                (new \DateTime($this->updated_at_end))->modify('+1 day')->format('Y-m-d')
            ]);
        }

        $query
            ->andFilterWhere(['mail_send_role.id' => $this->id])
            ->andFilterWhere(['like', 'mail_send_role_i18n.title', $this->mail_send_role_i18n_title]);

        return $dataProvider;
    }
}
