<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kurir;

/**
 * KurirSearch represents the model behind the search form about `backend\models\Kurir`.
 */
class KurirSearch extends Kurir
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TOTALWEIGHT', 'HARGA'], 'integer'],
            [['KURIR', 'KATEGORI', 'KURIRKATEGORI', 'ORIGINPROV', 'DESPROV', 'ORIGINCITY', 'DESCITY', 'POSTALCODEORIGIN', 'POSTALCODEDESC'], 'safe'],
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
        $query = Kurir::find();

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
            'ID' => $this->ID,
            'TOTALWEIGHT' => $this->TOTALWEIGHT,
            'HARGA' => $this->HARGA,
        ]);

        $query->andFilterWhere(['like', 'KURIR', $this->KURIR])
            ->andFilterWhere(['like', 'KATEGORI', $this->KATEGORI])
            ->andFilterWhere(['like', 'KURIRKATEGORI', $this->KURIRKATEGORI])
            ->andFilterWhere(['like', 'ORIGINPROV', $this->ORIGINPROV])
            ->andFilterWhere(['like', 'DESPROV', $this->DESPROV])
            ->andFilterWhere(['like', 'ORIGINCITY', $this->ORIGINCITY])
            ->andFilterWhere(['like', 'DESCITY', $this->DESCITY])
            ->andFilterWhere(['like', 'POSTALCODEORIGIN', $this->POSTALCODEORIGIN])
            ->andFilterWhere(['like', 'POSTALCODEDESC', $this->POSTALCODEDESC]);

        return $dataProvider;
    }
}
