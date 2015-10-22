<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Provinsi;

/**
 * ProvinceSearch represents the model behind the search form about `backend\models\Provinsi`.
 */
class ProvinceSearch extends Provinsi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROVINCE_ID'], 'integer'],
            [['PROVINCE'], 'safe'],
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
        $query = Provinsi::find();

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
            'PROVINCE_ID' => $this->PROVINCE_ID,
        ]);

        $query->andFilterWhere(['like', 'PROVINCE', $this->PROVINCE]);

        return $dataProvider;
    }
}
