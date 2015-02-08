<?php

namespace blog\backend\controllers;

use Yii;
use blog\models\BlogPost as MainModel;
use blog\models\BlogPostSearch as MainModelSearch;
use cms\components\Controller;
use yii\filters\VerbFilter;

/**
 * BlogPostController implements the CRUD actions for BlogPost model.
 */
class BlogPostController extends Controller
{
    public function init() {
        $this->mainModel = MainModel::className();
        $this->mainModelSearch = MainModelSearch::className();
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
}
