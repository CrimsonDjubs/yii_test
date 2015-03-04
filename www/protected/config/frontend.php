<?php

return CMap::mergeArray(
    require_once(dirname(__FILE__) . '/main.php'),
    array(
         'name'=>'Сайт',
         'defaultController' => 'site/index',
         'components' => array(
             'user' => array(
                 //'class' => 'FrontendWebUser',
                 'allowAutoLogin' => true,
                 'loginUrl' => array('site/index'),
             ),
             'log' => array(
                 'class' => 'CLogRouter',
                 'routes' => array(
                     array(
                         'class' => 'CFileLogRoute',
                         'levels' => 'error, warning',
                     ),
                 ),
             ),
             'urlManager' => array(
                         'urlFormat' => 'path',
                         'showScriptName' => false,
                         'rules' => array(
                             '<language:(ru|uk|en)>/' => 'site/index',
                             '<language:(ru|uk|en)>/<controller:\w+>/<id:\d+>' => '<controller>/view',
                             //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                             '<language:(ru|uk|en)>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                         ),
                     ),
         ),
    )
);