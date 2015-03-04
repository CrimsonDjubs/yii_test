<?php $this->pageTitle=Yii::app()->name . ' - Настройки'; ?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'settings-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'mws-form'),
)); ?>
<div class="mws-form-inline">
<?php
	$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'themeUrl'=>Yii::app()->baseUrl.'/css',
    'theme'=>'jui',
    'cssFile'=>'jquery.ui.css',
    'panels'=>array(
        '1C выгрузка'=>$this->renderPartial('_export',array('model'=>$model, 'form'=>$form),true),
        //'Контакты'=>$this->renderPartial('_contacts',array('model'=>$model, 'form'=>$form),true),
        //'Сервисы'=>$this->renderPartial('_service',array('model'=>$model, 'form'=>$form),true),
        //'Оповещения'=>$this->renderPartial('_notify',array('model'=>$model, 'form'=>$form),true),
    ),
    'htmlOptions'=>array(
        'class'=>'mws-accordion',
    ),
    'options'=>array(
        //'animated'=>'bounceslide',
    ),
));
?>
</div>
<br />
<?php echo CHtml::submitButton('Сохранить', array('class'=>'mws-button green')); ?><br /><br />
<?php $this->endWidget(); ?>