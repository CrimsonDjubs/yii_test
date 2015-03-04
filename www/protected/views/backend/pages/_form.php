<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'page-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'mws-form'),
)); ?>
<div class="mws-form-inline">    
    <div class="mws-form-row">
        <?php echo $form->labelEx($model,'alias'); ?>
        <div class="mws-form-item small">
            <?php echo $form->textField($model,'alias',array('class'=>'mws-textinput')); ?>
            <?php echo $form->error($model,'alias',array('class'=>'mws-error')); ?>
        </div>
    </div>
    <div class="mws-form-row">
        <?php echo $form->labelEx($model,'type'); ?>
        <div class="mws-form-item small">
            <?php echo $form->dropDownList(
                $model,
                'type',
                array(0=>'Выберите тип',1=>'Полезная информация',2=>'О службе 1563',3=>'Аварийные службы',4=>'Отчет за неделю',5=>'Тарифы'),
                array('class'=>'mws-textinput','ajax'=>array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('pages/parent'),
                    'update'=>'#Pages_parent'
                ))); ?>
            <?php echo $form->error($model,'type',array('class'=>'mws-error')); ?>
        </div>
    </div>
    <div class="mws-form-row">
        <?php echo $form->labelEx($model,'parent'); ?>
        <div class="mws-form-item small">
            <?php echo $form->dropDownList($model,'parent',$parents,array('class'=>'mws-textinput')); ?>
            <?php echo $form->error($model,'parent',array('class'=>'mws-error')); ?>
        </div>
    </div>
    <div class="mws-form-row">
<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Русский язык'=>$this->renderPartial('_form_ru', array('model'=>$model,'form'=>$form),true),
        'Украинский язык'=>$this->renderPartial('_form_ua', array('model'=>$model,'form'=>$form),true),
    ),
    'themeUrl'=>Yii::app()->baseUrl.'/css',
    'theme'=>'jui',
    'cssFile'=>'jquery.ui.css',
    'options'=>array(
        'collapsible'=>true,
    ),
));
?>
    </div>
    <div class="mws-button-row">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'mws-button green')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>