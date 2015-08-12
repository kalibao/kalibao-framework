<?php
/**
 * @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
 * @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
 */

namespace kalibao\backend\modules\rbac\models\rbacRole\crud;

use Yii;
use yii\data\ActiveDataProvider;
use kalibao\common\components\crud\ModelFilterInterface;
use kalibao\common\models\rbacRole\RbacRole;

/**
 * This is the model filter class for controller "RbacRole".
 *
 * @property integer $id
 * @property string $name
 * @property string $rule_path
 * @property string $rbac_role_i18n_title
 * @property string $created_at_start
 * @property string $created_at_end
 * @property string $updated_at_start
 * @property string $updated_at_end
 *
 * @package kalibao\backend\modules\rbac\models\rbacRole\crud
 * @version 1.0
 * @author Kévin Walter <walkev13@gmail.com>
 */
class ModelFilter extends RbacRole implements ModelFilterInterface
{
    public $rbac_role_i18n_title;
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
                'id', 'created_at_start', 'created_at_end', 'updated_at_start', 'updated_at_end',
                'name', 'rule_path', 'rbac_role_i18n_title'
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
            [['name', 'rule_path', 'rbac_role_i18n_title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();
        $attributeLabels['rbac_role_i18n_title'] = Yii::t('kalibao','model:title');
        return $attributeLabels;
    }

    /**
     * @inheritdoc
     */
    public function search($requestParams, $language = null, $pageSize = 10)
    {
        $query = self::find();

        $query->joinWith([
            'rbacRoleI18ns' => function ($query) use ($language) {
                $query->select(['rbac_role_id', 'title'])->onCondition(['rbac_role_i18n.i18n_id' => $language]);
            },
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'id',
                    'name' => [
                        'label' => $this->getAttributeLabel('name')
                    ],
                    'rule_path' => [
                        'label' => $this->getAttributeLabel('rule_path')
                    ],
                    'rbac_role_i18n_title' => [
                        'asc' => ['rbac_role_i18n.title' => SORT_ASC],
                        'desc' => ['rbac_role_i18n.title' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => $this->getAttributeLabel('rbac_role_i18n_title')
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

        $query->andFilterWhere(['>=', 'rbac_role.created_at', $this->created_at_start]);
        if ($this->created_at_end != '') {
            $query->andWhere([
                '<=',
                'rbac_role.created_at',
                (new \DateTime($this->created_at_end))->modify('+1 day')->format('Y-m-d')
            ]);
        }
        $query->andFilterWhere(['>=', 'rbac_role.updated_at', $this->updated_at_start]);
        if ($this->updated_at_end != '') {
            $query->andWhere([
                '<=',
                'rbac_role.updated_at',
                (new \DateTime($this->updated_at_end))->modify('+1 day')->format('Y-m-d')
            ]);
        }

        $query
            ->andFilterWhere(['rbac_role.id' => $this->id])
            ->andFilterWhere(['like', 'rbac_role.name', $this->name])
            ->andFilterWhere(['like', 'rbac_role.rule_path', $this->rule_path])
            ->andFilterWhere(['like', 'rbac_role_i18n.title', $this->rbac_role_i18n_title]);

        return $dataProvider;
    }
}
