<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

$yii=dirname(__FILE__).'/../lib/yii.php';
$config=dirname(__FILE__).'/../app/config/main.php';
require_once($yii);
Yii::createWebApplication($config)->run();
