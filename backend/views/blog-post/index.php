<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel blog\models\BlogPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blog Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-post-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user.username',
            'comments',
            'title',
            'body:ntext',
            // 'thumbnail',
            // 'excerpt:ntext',
            // 'status',
            // 'slug',
            // 'update_time',
            // 'update_by',
            // 'create_time',
            // 'create_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
