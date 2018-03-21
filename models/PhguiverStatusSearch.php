<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PhguiverStatus;

/**
 * PhguiverStatusSearch represents the model behind the search form about `app\models\PhguiverStatus`.
 */
class PhguiverStatusSearch extends PhguiverStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['STATION_ID', 'PHGUI_VERSION', 'STATION_IP', 'FACILITY_NAME', 'PHGUI_PATH', 'LAST_DB_UPDATE'], 'safe'],
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
        $query = PhguiverStatus::find();

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
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'STATION_ID', $this->STATION_ID])
            ->andFilterWhere(['like', 'PHGUI_VERSION', $this->PHGUI_VERSION])
            ->andFilterWhere(['like', 'STATION_IP', $this->STATION_IP])
            ->andFilterWhere(['like', 'FACILITY_NAME', $this->FACILITY_NAME])
            ->andFilterWhere(['like', 'PHGUI_PATH', $this->PHGUI_PATH])
            ->andFilterWhere(['like', 'LAST_DB_UPDATE', $this->LAST_DB_UPDATE]);

        return $dataProvider;
    }
}
