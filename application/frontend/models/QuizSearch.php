<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Quiz;

/**
 * QuizSearch represents the model behind the search form of `frontend\models\Quiz`.
 */
class QuizSearch extends Quiz
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'section_id', 'input_type', 'sort_order', 'active'], 'integer'],
            [['question', 'options'], 'safe'],
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
        $query = Quiz::find();

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
            'section_id' => $this->section_id,
            'input_type' => $this->input_type,
            'sort_order' => $this->sort_order,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'options', $this->options]);

        return $dataProvider;
    }
}
