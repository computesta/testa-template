<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Authority;

/**
 * AuthoritySearch represents the model behind the search form about `\app\models\Authority`.
 */
class AuthoritySearch extends Authority
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'study_program_id', 'semester_start', 'semester_end', 'created_by', 'updated_by'], 'integer'],
            [['name', 'created_at', 'updated_at','studyProgramName'], 'safe'],
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
        $query = Authority::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		$dataProvider->setSort([
            'attributes' => \yii\helpers\ArrayHelper::merge($dataProvider->sort->attributes,[
                'studyProgramName' => [
                    'asc' => ['study_program.name' => SORT_ASC],
                    'desc' => ['study_program.name' => SORT_DESC],
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
		
		$query->joinWith(['studyProgram']);

        $query->andFilterWhere([
            'id' => $this->id,
            'study_program_id' => $this->study_program_id,
            'semester_start' => $this->semester_start,
            'semester_end' => $this->semester_end,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
				->andFilterWhere(['like', 'study_program.name', $this->studyProgramName]);

        return $dataProvider;
    }
}
