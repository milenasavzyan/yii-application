<?php

namespace backend\models;

use common\models\Post;
use yii\data\ActiveDataProvider;

class PostSearch extends Post
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'content'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Post::find();

        // Join with CategoryPost to fetch categories related to each post
        $query->joinWith(['categories']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Other code for filtering and sorting...

        return $dataProvider;
    }

}
