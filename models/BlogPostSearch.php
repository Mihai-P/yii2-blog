<?php

namespace blog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use blog\models\BlogPost;

/**
 * BlogPostSearch represents the model behind the search form about `blog\models\BlogPost`.
 */
class BlogPostSearch extends BlogPost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'comments', 'update_by', 'create_by'], 'integer'],
            [['title', 'body', 'thumbnail', 'excerpt', 'status', 'slug', 'update_time', 'create_time'], 'safe'],
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
        $query = BlogPost::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'comments' => $this->comments,
            'update_time' => $this->update_time,
            'update_by' => $this->update_by,
            'create_time' => $this->create_time,
            'create_by' => $this->create_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
            ->andFilterWhere(['like', 'excerpt', $this->excerpt])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
