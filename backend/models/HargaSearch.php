<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Harga;

/**
 * HargaSearch represents the model behind the search form about `backend\models\Harga`.
 */
class HargaSearch extends Harga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FWD_ID', 'FWD_SERVICE', 'FWD_STS', 'ORIGIN_PROVINCE', 'ORIGIN_CITY', 'DES_PROVINCE', 'DES_CITY', 'STATUS'], 'integer'],
            [['FWD_NM', 'FWD_DATE_START', 'FWD_DATE_UPDATE'], 'safe'],
            [['HARGA'], 'number'],
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
        $query = Harga::find();

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
            'FWD_ID' => $this->FWD_ID,
            'FWD_SERVICE' => $this->FWD_SERVICE,
            'FWD_STS' => $this->FWD_STS,
            'FWD_DATE_START' => $this->FWD_DATE_START,
            'FWD_DATE_UPDATE' => $this->FWD_DATE_UPDATE,
            'ORIGIN_PROVINCE' => $this->ORIGIN_PROVINCE,
            'ORIGIN_CITY' => $this->ORIGIN_CITY,
            'DES_PROVINCE' => $this->DES_PROVINCE,
            'DES_CITY' => $this->DES_CITY,
            'HARGA' => $this->HARGA,
            'STATUS' => $this->STATUS,
        ]);

        $query->andFilterWhere(['like', 'FWD_NM', $this->FWD_NM]);

        return $dataProvider;
    }
}
