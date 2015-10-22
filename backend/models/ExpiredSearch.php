<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Expired;

/**
 * ExpiredSearch represents the model behind the search form about `backend\models\Expired`.
 */
class ExpiredSearch extends Expired
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_ID'], 'integer'],
            [['STATUS', 'DURASI_WAKTU', 'CANCEL_TIME'], 'safe'],
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
        $query = Expired::find();

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
            'STATUS_ID' => $this->STATUS_ID,
        ]);

        $query->andFilterWhere(['like', 'STATUS', $this->STATUS])
            ->andFilterWhere(['like', 'DURASI_WAKTU', $this->DURASI_WAKTU])
            ->andFilterWhere(['like', 'CANCEL_TIME', $this->CANCEL_TIME]);

        return $dataProvider;
    }
}
