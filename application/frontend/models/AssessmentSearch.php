<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Assessment;

/**
 * AssessmentSearch represents the model behind the search form of `frontend\models\Assessment`.
 */
class AssessmentSearch extends Assessment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'completed'], 'integer'],
            [['community', 'gender', 'stage'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Assessment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'completed' => $this->completed,
        ]);

        $query->andFilterWhere(['like', 'community', $this->community])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'stage', $this->stage]);

        return $dataProvider;
    }
}
