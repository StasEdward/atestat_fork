<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Phostestglobaltest;

/**
 * PhostestglobaltestSearch represents the model behind the search form of `app\models\Phostestglobaltest`.
 */
class PhostestglobaltestSearch extends Phostestglobaltest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'UUTPLACE', 'INDEXRANGE'], 'integer'],
            [['FACILITY', 'STATIONID', 'UUTNAME', 'PARTNUMBER', 'SERIALNUMBER', 'TECHNAME', 'TESTDATE', 'TIMESTART', 'TIMESTOP', 'TESTMODE', 'GLOBALRESULT', 'VERSIONS'], 'safe'],
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
        $query = Phostestglobaltest::find();

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
            'TESTDATE' => $this->TESTDATE,
            'TIMESTART' => $this->TIMESTART,
            'TIMESTOP' => $this->TIMESTOP,
            'UUTPLACE' => $this->UUTPLACE,
            'INDEXRANGE' => $this->INDEXRANGE,
        ]);

        $query->andFilterWhere(['like', 'FACILITY', $this->FACILITY], false)
            ->andFilterWhere(['like', 'STATIONID', $this->STATIONID], false)
            ->andFilterWhere(['like', 'UUTNAME', $this->UUTNAME], false)
            ->andFilterWhere(['like', 'PARTNUMBER', $this->PARTNUMBER], false)
            ->andFilterWhere(['=', 'SERIALNUMBER', $this->SERIALNUMBER], false)
            ->andFilterWhere(['like', 'TECHNAME', $this->TECHNAME], false)
            ->andFilterWhere(['like', 'TESTMODE', $this->TESTMODE], false)
            ->andFilterWhere(['like', 'GLOBALRESULT', $this->GLOBALRESULT], false)
            ->andFilterWhere(['like', 'VERSIONS', $this->VERSIONS], false);

        return $dataProvider;
    }
}
