<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GlobalTest;

/**
 * GlobalTestSearch represents the model behind the search form about `app\models\GlobalTest`.
 */
class GlobalTestSearch extends GlobalTest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'UUTPLACE'], 'integer'],
            [['FACILITY', 'STATIONID', 'UUTNAME', 'PARTNUMBER', 'SERIALNUMBER', 'TECHNAME', 'TESTDATE', 'TIMESTART', 'TIMESTOP', 'TESTMODE', 'GLOBALRESULT', 'VERSIONS'], 'safe'],
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

        if ((Yii::$app->user->identity->username <> 'admin') AND (Yii::$app->user->identity->username <> 'Ceragon'))
          $query = GlobalTest::find()->andWhere(['FACILITY' => Yii::$app->user->identity->username]);
        else
          $query = GlobalTest::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
//            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
            'sort'=> ['defaultOrder' => ['TESTDATE'=>SORT_DESC]]
//            'sort'=> ['defaultOrder' => ['TESTDATE'=>SORT_DESC, 'id'=>SORT_DESC]]
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
            'FACILITY' => $this->FACILITY,
            'TESTDATE' => $this->TESTDATE,
            'TIMESTART' => $this->TIMESTART,
            'TIMESTOP' => $this->TIMESTOP,
            'UUTPLACE' => $this->UUTPLACE,
        ]);

        $tmp_uut = $this->UUTNAME;
//        echo $tmp_uut;
//        echo "<br>";
        if (strpos($tmp_uut, '*')){
//            echo "tyt";
//            echo "<br>";
            $tmp_uut = str_replace('*','',$tmp_uut);

    //        echo $tmp_uut;
    //        echo "<br>";

            $query->andFilterWhere(['like', 'STATIONID', $this->STATIONID], false)
            //    ->andFilterWhere(['like', 'FACILITY', $this->FACILITY])
                //->andFilterWhere(['like', 'TESTDATE', $this->TESTDATE])
                ->andFilterWhere(['like', 'UUTNAME', $tmp_uut], false)
                ->andFilterWhere(['like', 'PARTNUMBER', $this->PARTNUMBER], false)
                ->andFilterWhere(['=', 'SERIALNUMBER', $this->SERIALNUMBER])
    //            ->andFilterWhere(['like', 'TECHNAME', $this->TECHNAME])
                ->andFilterWhere(['like', 'TESTMODE', $this->TESTMODE], false)
                ->andFilterWhere(['like', 'GLOBALRESULT', $this->GLOBALRESULT], false);
    //            ->andFilterWhere(['like', 'VERSIONS', $this->VERSIONS]);


        }
        else{
        //    echo "tyt";
            $query->andFilterWhere(['like', 'STATIONID', $this->STATIONID, false])
            //    ->andFilterWhere(['like', 'FACILITY', $this->FACILITY])
                //->andFilterWhere(['like', 'TESTDATE', $this->TESTDATE])
                ->andFilterWhere(['like', 'UUTNAME', $this->UUTNAME], false)
                ->andFilterWhere(['like', 'PARTNUMBER', $this->PARTNUMBER], false)
                ->andFilterWhere(['=', 'SERIALNUMBER', $this->SERIALNUMBER], false)
    //            ->andFilterWhere(['like', 'TECHNAME', $this->TECHNAME])
                ->andFilterWhere(['like', 'TESTMODE', $this->TESTMODE], false)
                ->andFilterWhere(['like', 'GLOBALRESULT', $this->GLOBALRESULT], false);
    //            ->andFilterWhere(['like', 'VERSIONS', $this->VERSIONS]);


        }

        return $dataProvider;
    }
}
