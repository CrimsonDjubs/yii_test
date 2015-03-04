<?php
$yii=dirname(__FILE__).'/framework/yii.php';
$config = dirname(__FILE__) . '/protected/config/frontend.php';

require_once($yii);
Yii::createWebApplication($config)->runEnd('frontend');
