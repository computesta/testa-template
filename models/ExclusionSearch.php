<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exclusion;

/**
 * ExclusionSearch represents the model behind the search form about `\app\models\Exclusion`.
 */
class ExclusionSearch extends Exclusion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'authority_id', 'level_max'], 'integer'],
			[['userName', 'authorityName'], 'safe'],
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
        $query = Exclusion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		$dataProvider->setSort([
            'attributes' => \yii\helpers\ArrayHelper::merge($dataProvider->sort->attributes,[
                'userName' => [
                    'asc' => ['ppds_detail.name' => SORT_ASC],
                    'desc' => ['ppds_detail.name' => SORT_DESC],
                ],
				'authorityName' => [
                    'asc' => ['authority.name' => SORT_ASC],
                    'desc' => ['authority.name' => SORT_DESC],
                ],
			]),
			'defaultOrder' => ['id' => SORT_DESC]
        ]);

        $this->load($params);
		
		$query->joinWith(['user','authority']);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'authority_id' => $this->authority_id,
            'level_max' => $this->level_max,
        ]);
		
		$query->andFilterWhere(['like', 'ppds_detail.name', $this->userName])
				->andFilterWhere(['like', 'authority.name', $this->authorityName]);

        return $dataProvider;
    }
}
