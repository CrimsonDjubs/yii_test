<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->clientScript->registerCoreScript('jquery')
                    ->registerScriptFile(Yii::app()->request->baseUrl.'/js/scripts.js')
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/shortcodes.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/crawler.js"></script>
</head>
<body>
<div class="fixed">
    <div id="header">
        <div class="top_line"></div>
        <div class="inner">
            <div class="logo">
                <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/sev_logo.jpg',Yii::t('main','Logo')) ?>
                <br />
                <?php echo Yii::t('main','SGGA'); ?>
            </div>
            <div class="logo2">
                <?php $this->widget('application.components.widgets.LangBox'); ?>
                <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/service_logo.jpg',Yii::t('main','Logo')) ?>
                <br />
                <?php echo Yii::t('main','logo_text'); ?>
            </div>
            <div class="header">
                <p style="font-size: 17px; margin: 0; font-weight: bold;">КО "Службы информации и помощи населению г. Севастополя"</p>
                <?php echo Yii::t('main', 'hotline_1563'); ?>
                <br/>
                <?php echo Yii::t('main', '1563_info'); ?>
            </div>
        </div>
    </div>
    <nav id="navigation">
      <div class="nav_wrap">
        <div class="inner">
  		<?php $this->widget('zii.widgets.CMenu',array(
            'id'=>'menu-main',
            'encodeLabel'=>false,
            'activeCssClass'=>'current-menu-item',
            //'firstItemCssClass'=>'home',
            'htmlOptions'=>array('class'=>'nav'),
 			'items'=>array(
                array('label'=>Yii::t('main','Home'), 'url'=>array('site/index')),
                array('label'=>Yii::t('main','About'), 'url'=>array('site/about')),
                array('label'=>Yii::t('main','Contact_center'), 'url'=>array('site/contacts')),
                array('label'=>Yii::t('main','Emergency_services'), 'url'=>array('site/emerg')),
                array('label'=>Yii::t('main','Leave_a_treatment'), 'url'=>array('site/leave')),
                array('label'=>Yii::t('main','Map'), 'url'=>array('site/map')),
                array('label'=>Yii::t('main','Tarrifs'), 'url'=>array('site/tarifs')),
                array('label'=>Yii::t('main','Cabinet'), 'url'=>array('user/index')),
 			),
  		)); ?>   
        </div>
      </div>
    </nav>
    <?php $this->widget('application.components.widgets.FRunLine'); ?>
    <div class="inner">
        <div class="container">
            <?php echo $content; ?>
        </div>
    </div>
</div>
<!--
<div class="scrollTo_top" style="display: block">
    <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/css/images/up.png',Yii::t('main','Scroll_to_top')),'#',array('title'=>Yii::t('main','Scroll_to_top'))); ?>    
</div>
-->
<footer align="center">
<!--LiveInternet counter-->
<script style="align: center" type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+"target=_blank><img src='//counter.yadro.ru/hit?t52.2;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+";"+Math.random()+"' alt='' title='LiveInternet: показано число просмотров и"+
" посетителей за 24 часа' "+
"border='0' width='88' height='31'><\/a>")
//--></script>
<!--/LiveInternet--> 
</footer>
</body>
</html>