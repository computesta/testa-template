<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form about `\app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'location_id', 'supervisor_id', 'authority_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['authority_phase', 'date', 'case', 'description', 'difficulty', 'learn', 'plan', 'picture', 'created_at', 'updated_at'], 'safe'],
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
        $query = Activity::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'location_id' => $this->location_id,
            'supervisor_id' => $this->supervisor_id,
            'authority_id' => $this->authority_id,
            'authority_phase' => $this->authority_phase,
            'date' => $this->date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'case', $this->case])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'difficulty', $this->difficulty])
            ->andFilterWhere(['like', 'learn', $this->learn])
            ->andFilterWhere(['like', 'plan', $this->plan])
            ->andFilterWhere(['like', 'picture', $this->picture]);

        return $dataProvider;
    }
}
