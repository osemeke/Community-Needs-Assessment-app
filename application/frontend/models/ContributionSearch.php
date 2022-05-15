<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Contribution;

/**
 * ContributionSearch represents the model behind the search form of `frontend\models\Contribution`.
 */
class ContributionSearch extends Contribution
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'date_created', 'completed'], 'integer'],
            [['name', 'phone_number', 'email', 'lga', 'community', 'ward', 'unit', 'gender', 'disability', 'age_range', 'education_obtained', 'employment_status', 'trade_skill'], 'safe'],
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
        $query = Contribution::find()->where(['completed' => 1]);

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
            'date_created' => $this->date_created,
            'completed' => $this->completed,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'lga', $this->lga])
            ->andFilterWhere(['like', 'community', $this->community])
            ->andFilterWhere(['like', 'ward', $this->ward])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'disability', $this->disability])
            ->andFilterWhere(['like', 'age_range', $this->age_range])
            ->andFilterWhere(['like', 'education_obtained', $this->education_obtained])
            ->andFilterWhere(['like', 'employment_status', $this->employment_status])
            ->andFilterWhere(['like', 'trade_skill', $this->trade_skill]);

        return $dataProvider;
    }
}
