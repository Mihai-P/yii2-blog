<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace blog;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\web\Controller;
use yii\base\Event;

class BlogBootstrap implements BootstrapInterface{
    public function bootstrap($app){
        \Yii::setAlias('blog', __DIR__);
    }
}
