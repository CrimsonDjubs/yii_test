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
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" /> 
   
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/crawler.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.marquee.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $().ready(function() {
                $('#runLine').marquee();
                $('#services-list a').tooltip();
            });
        </script>
    </head>
<body>
<div id="main" >
    <div class="container">
        
    <!-- Header -->
        <div id="header">
            <div class="row-fluid">
                <div class="span3" align="center"><a href="http://www.sev.gov.ua" target="_blank"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/sev_logo.jpg',Yii::t('main','Logo')) ?></a>
                    <br/><small><?php echo Yii::t('main','SGGA'); ?></small>
                </div>
                <div class="span6" id="title"><h4 align="center">КО "Служба информации и помощи населению г. Севастополя"</h4>
                        <?php echo Yii::t('main','hotline_1563'); ?>
                </div>
                <div class="span3" align="center">
                        <a href="/"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/service_logo.jpg',Yii::t('main','Logo')) ?></a>
                        <?php echo Yii::t('main','logo_text'); ?>
                </div>
            </div>
            <div id="langs-wrapper">
                <div align="right">
                    <div class="btn-group" align="left">
                        <a class="btn btn dropdown-toggle" data-toggle="dropdown" href="#"> <img src="/images/flags/<?= Yii::app()->language;?>.png" /> <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <?php $this->widget('application.components.widgets.LangBox'); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>    
        <div id="menu" align="center">
            <div class="btn-group"> 
                <?php echo CHtml::link(Yii::t('main','Home'), array('site/index'), array('class'=>Yii::app()->request->url=='/site/index' ? 'active btn btn-primary' : 'btn btn-primary')); ?>
                <?php echo CHtml::link(Yii::t('main','About'), array('site/about'), array('class'=>Yii::app()->request->url=='/site/about' ? 'active btn btn-primary' : 'btn btn-primary')); ?>
                <?php echo CHtml::link(Yii::t('main','Contact_center'), array('site/contacts'), array('class'=>Yii::app()->request->url=='/site/contacts' ? 'active btn btn-primary' : 'btn btn-primary')); ?>
                <?php echo CHtml::link(Yii::t('main','Emergency_services'), array('site/emerg'), array('class'=>Yii::app()->request->url=='/site/emerg' ? 'active btn btn-primary' : 'btn btn-primary')); ?>
                <?php echo CHtml::link(Yii::t('main','Leave_a_treatment'), array('site/leave'), array('class'=>Yii::app()->request->url=='/site/leave' ? 'active btn btn-primary' : 'btn btn-primary')); ?>
                <?php echo CHtml::link(Yii::t('main','Map'), array('site/map'), array('class'=>Yii::app()->request->url=='/site/map' ? 'active btn btn-primary' :'btn btn-primary')); ?>
                <?php echo CHtml::link(Yii::t('main','Tarrifs'), array('site/tarifs'), array('class'=>Yii::app()->request->url=='/site/tarifs' ? 'active btn btn-primary' : 'btn btn-primary')); ?>
                <?php echo CHtml::link(Yii::t('main','Cabinet'), array('user/index'), array('class'=>Yii::app()->request->url=='/user/index' ? 'active btn btn-primary' : 'btn btn-primary')); ?>
            </div>
        </div>
    <!-- EO Header-->
      
    <!-- Runline -->
      
        <div id="runLine-wrapper">
       <!--     <div id="runline">   -->
                    <?php $this->widget('application.components.widgets.FRunLine'); ?> 
       <!--     </div> -->
        </div> 
    <!-- EO Run Line--> 
      
    <!-- Main Block -->        
        <div id="body" class="row-fluid">  
    <!-- EO Left Panel-->
            <div class="span3">
            <!--  Content-->
                <?php $this->widget('application.components.widgets.FCrashs'); ?>
                <?php $this->widget('application.components.widgets.FTreePages', array('type'=>Pages::TYPE_INFO)); ?>
            </div>
            <div class="span9" id="main-content">
                <?php echo $content; ?>
            </div>
    <!-- EO Content -->
        </div>
    <!-- EO Main block -->
    
    <!--Footer-->
        <div id="footer">
           <!-- <div align="center" id="footer-menu">
                <?php $this->widget('application.components.widgets.FTreePages', array('type'=>Pages::TYPE_ABOUT)); ?>
            </div>    -->
            <!--LiveInternet counter-->
            <script style="align: center" type="text/javascript"><!--
            document.write("<a href='http://www.liveinternet.ru/click' "+"target=_blank><img src='http://counter.yadro.ru/hit?t52.2;rhttp%3A//www.sevinform1563.com.ua/site/pages/alias/priempredprgkh;s1366*768*24;uhttp%3A//www.sevinform1563.com.ua/site/index;0.49324886079129027' alt='' title='LiveInternet: показано число просмотров и"+
            " посетителей за 24 часа' "+
            "border='0' width='88' height='31'><\/a>")
            //-->
            </script>
            <!--/LiveInternet--> 
        </div>
    <!-- EO Footer-->
    </div>
</div>
<!--
<div class="scrollTo_top" style="display: block">
    <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/css/images/up.png',Yii::t('main','Scroll_to_top')),'#',array('title'=>Yii::t('main','Scroll_to_top'))); ?>    
</div>
-->

</body>
</html>