<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PackageAuthority;

/**
 * PackageAuthoritySearch represents the model behind the search form about `\app\models\PackageAuthority`.
 */
class PackageAuthoritySearch extends PackageAuthority
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'package_id', 'authority_id', 'level_max'], 'integer'],
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
        $query = PackageAuthority::find();

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
            'package_id' => $this->package_id,
            'authority_id' => $this->authority_id,
            'level_max' => $this->level_max,
        ]);

        return $dataProvider;
    }
}
