<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fenomena;

/**
 * FenomenaSearch represents the model behind the search form about `app\models\Fenomena`.
 */
class FenomenaSearch extends Fenomena
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sumber_id', 'kecamatan_id', 'lapangan_usaha', 'pengaruh_id', 'isVerified'], 'integer'],
            [['tanggal_fenomena', 'isi_fenomena', 'tanggal_entri', 'upload_foto_dokumen'], 'safe'],
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
        $query = Fenomena::find();

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
            'id' => $this->id,
            'tanggal_fenomena' => $this->tanggal_fenomena,
            'sumber_id' => $this->sumber_id,
            'kecamatan_id' => $this->kecamatan_id,
            'lapangan_usaha' => $this->lapangan_usaha,
            'pengaruh_id' => $this->pengaruh_id,
            'tanggal_entri' => $this->tanggal_entri,
            'isVerified' => $this->isVerified,
        ]);

        $query->andFilterWhere(['like', 'isi_fenomena', $this->isi_fenomena])
            ->andFilterWhere(['like', 'upload_foto_dokumen', $this->upload_foto_dokumen]);

        return $dataProvider;
    }
}
