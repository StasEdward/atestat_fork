<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StationUtilizationConfig;

/**
 * StationUtilizationConfigSearch represents the model behind the search form about `app\models\StationUtilizationConfig`.
 */
class StationUtilizationConfigSearch extends StationUtilizationConfig
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'THROUGHPUT_TYPE', 'STATUS', 'STATION_COUNT'], 'integer'],
            [['CM_NAME', 'STATION_FAMILY', 'STATION_NAME', 'REAL_STATION_NAME', 'STATION_TYPE'], 'safe'],
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
        $query = StationUtilizationConfig::find();

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
            'THROUGHPUT_TYPE' => $this->THROUGHPUT_TYPE,
            'STATUS' => $this->STATUS,
        ]);

        $query->andFilterWhere(['like', 'CM_NAME', $this->CM_NAME])
            ->andFilterWhere(['like', 'STATION_FAMILY', $this->STATION_FAMILY])
            ->andFilterWhere(['like', 'STATION_NAME', $this->STATION_NAME])
            ->andFilterWhere(['like', 'REAL_STATION_NAME', $this->REAL_STATION_NAME])
            ->andFilterWhere(['like', 'STATION_COUNT', $this->STATION_COUNT])
            ->andFilterWhere(['like', 'STATION_TYPE', $this->STATION_TYPE]);

        return $dataProvider;
    }
}
