<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Progressjob;

/**
 * ProgressjobSearch represents the model behind the search form about `backend\models\Progressjob`.
 */
class ProgressjobSearch extends Progressjob
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROGRESS_ID', 'STATUS'], 'integer'],
            [['USER_ID', 'MODUL', 'JUDUL', 'KETERANGAN', 'STAR_DATE', 'END_DATE', 'PROGRESS', 'KETERANGAN_DETAIL'], 'safe'],
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
        $query = Progressjob::find();

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
            'PROGRESS_ID' => $this->PROGRESS_ID,
            'STAR_DATE' => $this->STAR_DATE,
            'END_DATE' => $this->END_DATE,
            'STATUS' => $this->STATUS,
        ]);

        $query->andFilterWhere(['like', 'USER_ID', $this->USER_ID])
            ->andFilterWhere(['like', 'MODUL', $this->MODUL])
            ->andFilterWhere(['like', 'JUDUL', $this->JUDUL])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN])
            ->andFilterWhere(['like', 'PROGRESS', $this->PROGRESS])
            ->andFilterWhere(['like', 'KETERANGAN_DETAIL', $this->KETERANGAN_DETAIL]);

        return $dataProvider;
    }
}
