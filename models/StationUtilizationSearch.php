<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StationUtilizationView;

/**
 * StationUtilizationViewSearch represents the model behind the search form about `app\models\StationUtilizationView`.
 */
class StationUtilizationSearch extends StationUtilization
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'STATION_COUNT', 'WORK_MINUTES'], 'integer'],
            [['FACILITY', 'SHORT_STATION_NAME', 'STATION_MASK', 'TEST_DATE'], 'safe'],
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
        $query = StationUtilization::find();

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
            'STATION_COUNT' => $this->STATION_COUNT,
            'WORK_MINUTES' => $this->WORK_MINUTES,
            'TEST_DATE' => $this->TEST_DATE,
        ]);

        $query->andFilterWhere(['like', 'FACILITY', $this->FACILITY])
            ->andFilterWhere(['like', 'SHORT_STATION_NAME', $this->SHORT_STATION_NAME])
            ->andFilterWhere(['like', 'STATION_MASK', $this->STATION_MASK]);

        return $dataProvider;
    }
}
