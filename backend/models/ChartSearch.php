<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Chart;

/**
 * ChartSearch represents the model behind the search form about `backend\models\Chart`.
 */
class ChartSearch extends Chart
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CHART_ID', 'USER_ID', 'KODE_POS_ORIGIN', 'KODE_POS_DES', 'TOTAL_BERAT', 'HARGA'], 'integer'],
            [['USERNAME', 'NOFAKTUR', 'KURIR', 'PROVORIGIN', 'PROVDES', 'ORIGIN_CITY', 'DES_CITY', 'KATEGORI_KIRIM'], 'safe'],
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
        $query = Chart::find();

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
            'CHART_ID' => $this->CHART_ID,
            'USER_ID' => $this->USER_ID,
            'KODE_POS_ORIGIN' => $this->KODE_POS_ORIGIN,
            'KODE_POS_DES' => $this->KODE_POS_DES,
            'TOTAL_BERAT' => $this->TOTAL_BERAT,
            'HARGA' => $this->HARGA,
        ]);

        $query->andFilterWhere(['like', 'USERNAME', $this->USERNAME])
            ->andFilterWhere(['like', 'NOFAKTUR', $this->NOFAKTUR])
            ->andFilterWhere(['like', 'KURIR', $this->KURIR])
            ->andFilterWhere(['like', 'PROVORIGIN', $this->PROVORIGIN])
            ->andFilterWhere(['like', 'PROVDES', $this->PROVDES])
            ->andFilterWhere(['like', 'ORIGIN_CITY', $this->ORIGIN_CITY])
            ->andFilterWhere(['like', 'DES_CITY', $this->DES_CITY])
            ->andFilterWhere(['like', 'KATEGORI_KIRIM', $this->KATEGORI_KIRIM]);

        return $dataProvider;
    }
}
