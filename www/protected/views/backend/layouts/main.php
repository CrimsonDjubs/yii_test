<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
    
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mws.style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mws.theme.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fluid.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/icons/icons.css" />
        <?php Yii::app()->clientScript->registerCoreScript('jquery')
				->registerScriptFile(Yii::app()->request->baseUrl.'/js/mws.js');
              Yii::app()->getClientScript()->registerScriptFile( Yii::app()->request->baseUrl.'/js/scripts.js');

    ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div id="mws-header" class="clearfix">
        <div id="mws-logo-container">
            <div id="mws-logo-wrap">
                <?php echo CHtml::image('/images/mws-logo.png') ?>
            </div>
        </div>
        <div id="mws-user-tools" class="clearfix">
            <div id="mws-user-message" class="mws-dropdown-menu">
                <?php
                    $mesNew = Messages::model()->countNew();
                    $mesNewHead = $mesNew ? CHtml::tag('span',array('class'=>'mws-dropdown-notif'),$mesNew) : '';
                    $mesNewSide = $mesNew ? CHtml::tag('span',array('class'=>'mws-nav-tooltip mws-inset'),$mesNew) : '';
                    echo CHtml::link('Сообщения',array('messages/index'),array('class'=>'mws-i-24 i-message mws-dropdown-trigger')).$mesNewHead;
                ?>            
            </div>
            <div id="mws-user-info" class="mws-inset">
                <div id="mws-user-functions">
                    <div id="mws-username">Привет, <?php echo Yii::app()->user->name; ?></div>
                    <ul>
                        <li><?php echo CHtml::link('Перейти на сайт','index.php',array('target'=>'_blank')); ?></li>
                        <li><?php echo CHtml::link('Выйти',array('site/logout')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="mws-wrapper">
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        <div id="mws-sidebar">
            <div id="mws-navigation">
        <?php if(!Yii::app()->user->checkAccess('runlineadmin')){
                $this->widget('zii.widgets.CMenu',array(
                'encodeLabel'=>false,
                'items'=>array(
                    array('label'=>'Главная', 'url'=>array('site/index'),'linkOptions'=>array('class'=>'mws-i-24 i-home'),'active'=>Yii::app()->controller->id == 'site' ? true : false),
                    array('label'=>'Бегущая строка', 'url'=>array('runline/index'),'linkOptions'=>array('class'=>'mws-i-24 i-loading-bar'),'active'=>Yii::app()->controller->id == 'runline' ? true : false),
                    array('label'=>'Сообщения'.$mesNewSide, 'url'=>array('messages/index'),'linkOptions'=>array('class'=>'mws-i-24 i-message'),'active'=>Yii::app()->controller->id == 'messages' ? true : false),
                    array('label'=>'Страницы', 'url'=>array('pages/index'),'linkOptions'=>array('class'=>'mws-i-24 i-documents-1'),'active'=>Yii::app()->controller->id == 'pages' ? true : false),
                    array('label'=>'Пользователи', 'url'=>array('users/index'),'linkOptions'=>array('class'=>'mws-i-24 i-users'),'active'=>Yii::app()->controller->id == 'users' ? true : false),
                    array('label'=>'Настройки','url'=>'#','linkOptions'=>array('class'=>'mws-i-24 i-settings-1'),'active'=>Yii::app()->controller->id == 'settings' ? true : false, 'items'=>array(
                        array('label'=>'Языки', 'url'=>array('settings/langs')),
                )),
                //array('label'=>'Настройки', 'url'=>array('settings/index'),'linkOptions'=>array('class'=>'mws-i-24 i-settings-1')),
			),   
		));
                }else{
                    $this->widget('zii.widgets.CMenu', array(
                    'encodeLabel'=>false, 
                    'items'=>array(
                        array('label'=>'Бегущая строка', 'url'=>array('runline/index'),'linkOptions'=>array('class'=>'mws-i-24 i-loading-bar'),'active'=>Yii::app()->controller->id == 'runline' ? true : false),
                    ),
                    ));
                }   
               ?>                 
            </div>
        </div>
        <div id="mws-container" class="clearfix">
            <div class="container">
                <?php echo $content; ?>
            </div>
            <div id="mws-footer"></div>
        </div>
    </div>
</body>
</html>