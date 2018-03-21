<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IpponRfuPartNumbers;

/**
 * IpponRfuPartNumbersSearch represents the model behind the search form about `app\models\IpponRfuPartNumbers`.
 */
class IpponRfuPartNumbersSearch extends IpponRfuPartNumbers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['indexr', 'tx_high', 'with_diplexer'], 'integer'],
            [['part_number', 'master_part_number'], 'safe'],
            [['tx_start_freq', 'tx_stop_freq', 'rx_start_freq', 'rx_stop_freq', 'tx_start_freq_2', 'tx_stop_freq_2', 'rx_start_freq_2', 'rx_stop_freq_2'], 'number'],
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
        $query = IpponRfuPartNumbers::find();

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
            'indexr' => $this->indexr,
            'tx_start_freq' => $this->tx_start_freq,
            'tx_stop_freq' => $this->tx_stop_freq,
            'rx_start_freq' => $this->rx_start_freq,
            'rx_stop_freq' => $this->rx_stop_freq,
            'tx_high' => $this->tx_high,
            'with_diplexer' => $this->with_diplexer,
            'tx_start_freq_2' => $this->tx_start_freq_2,
            'tx_stop_freq_2' => $this->tx_stop_freq_2,
            'rx_start_freq_2' => $this->rx_start_freq_2,
            'rx_stop_freq_2' => $this->rx_stop_freq_2,
        ]);

        $query->andFilterWhere(['like', 'part_number', $this->part_number])
            ->andFilterWhere(['like', 'master_part_number', $this->master_part_number]);

        return $dataProvider;
    }
}
