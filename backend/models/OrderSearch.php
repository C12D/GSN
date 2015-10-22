<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order;

/**
 * OrderSearch represents the model behind the search form about `backend\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['G_ORDER', 'G_RANDOM', 'G_PESAN', 'USER_ID', 'USER_NAME', 'NAMA_CUSTOMER', 'ALAMAT_CUSTOMER', 'EMAIL_CUSTOMER', 'CREATE_DATED', 'STATUS'], 'safe'],
            [['HANDPHONE', 'GRANDTOTAL'], 'integer'],
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
        $query = Order::find();

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
            'HANDPHONE' => $this->HANDPHONE,
            'GRANDTOTAL' => $this->GRANDTOTAL,
            'CREATE_DATED' => $this->CREATE_DATED,
        ]);

        $query->andFilterWhere(['like', 'G_ORDER', $this->G_ORDER])
            ->andFilterWhere(['like', 'G_RANDOM', $this->G_RANDOM])
            ->andFilterWhere(['like', 'G_PESAN', $this->G_PESAN])
            ->andFilterWhere(['like', 'USER_ID', $this->USER_ID])
            ->andFilterWhere(['like', 'USER_NAME', $this->USER_NAME])
            ->andFilterWhere(['like', 'NAMA_CUSTOMER', $this->NAMA_CUSTOMER])
            ->andFilterWhere(['like', 'ALAMAT_CUSTOMER', $this->ALAMAT_CUSTOMER])
            ->andFilterWhere(['like', 'EMAIL_CUSTOMER', $this->EMAIL_CUSTOMER])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS]);

        return $dataProvider;
    }
}
