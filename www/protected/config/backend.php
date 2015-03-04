<?php
return CMap::mergeArray(
    require_once(dirname(__FILE__) . '/main.php'),
    array(
         'name'=>'Admin panel',
         'defaultController' => 'site/index',
         'components' => array(
             'user' => array(
                 //'class' => 'BackendWebUser',
                 'allowAutoLogin' => true,
                 'loginUrl' => array('site/login'),
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
         ),
    )
);
