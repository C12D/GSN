<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Progressjobdetail;

/**
 * ProgressjobdetailSearch represents the model behind the search form about `backend\models\Progressjobdetail`.
 */
class ProgressjobdetailSearch extends Progressjobdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROGRESSJOBDETAIL_ID', 'PROGRESS_ID'], 'integer'],
            [['CREATED_DATE', 'KETERANGAN', 'PIC'], 'safe'],
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
        $query = Progressjobdetail::find();

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
            'PROGRESSJOBDETAIL_ID' => $this->PROGRESSJOBDETAIL_ID,
            'PROGRESS_ID' => $this->PROGRESS_ID,
            'CREATED_DATE' => $this->CREATED_DATE,
        ]);

        $query->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN])
            ->andFilterWhere(['like', 'PIC', $this->PIC]);

        return $dataProvider;
    }
}
