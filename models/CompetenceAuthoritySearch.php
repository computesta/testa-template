<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CompetenceAuthority;

/**
 * CompetenceAuthoritySearch represents the model behind the search form about `\app\models\CompetenceAuthority`.
 */
class CompetenceAuthoritySearch extends CompetenceAuthority
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'competence_id', 'authority_id'], 'integer'],
			[['competenceName', 'authorityName'], 'safe'],
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
        $query = CompetenceAuthority::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		$dataProvider->setSort([
            'attributes' => \yii\helpers\ArrayHelper::merge($dataProvider->sort->attributes,[
                'competenceName' => [
                    'asc' => ['competence.name' => SORT_ASC],
                    'desc' => ['competence.name' => SORT_DESC],
                ],
				'authorityName' => [
                    'asc' => ['authority.name' => SORT_ASC],
                    'desc' => ['authority.name' => SORT_DESC],
                ],
			]),
			'defaultOrder' => ['id' => SORT_DESC]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		$query->joinWith(['competence','authority']);

        $query->andFilterWhere([
            'id' => $this->id,
            'competence_id' => $this->competence_id,
            'authority_id' => $this->authority_id,
        ]);
		
		$query->andFilterWhere(['like', 'competence.name', $this->competenceName])
				->andFilterWhere(['like', 'authority.name', $this->authorityName]);

        return $dataProvider;
    }
}
