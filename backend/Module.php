<?php

namespace blog\backend;

class Module extends \yii\base\Module
{
	public $controllerNamespace = 'blog\backend\controllers';

    /**
     * @var int
     * @desc Remember Me Time (seconds), default = 2592000 (30 days)
     */
    public $rememberMeTime = 2592000; // 30 days

    public $pageTemplates = [
        [
            'file' => '_simple',
            'name' => 'Simple',
        ],
    ];

    public $attemptsBeforeCaptcha = 3; // Unsuccessful Login Attempts before Captcha

	public function init()
	{
		parent::init();

		\Yii::$app->getI18n()->translations['blog.*'] = [
			'class' => 'yii\i18n\PhpMessageSource',
			'basePath' => __DIR__.'/messages',
		];
		$this->setAliases([
			'@blog' => __DIR__
		]);
    }
}