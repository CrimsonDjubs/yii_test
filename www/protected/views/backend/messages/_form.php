<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'mws-form'),
)); ?>
<div class="mws-form-inline">    
    <div class="mws-form-row">
        <?php echo $form->labelEx($model,'text'); ?>
        <div class="mws-form-item small">
            <?php echo $form->textArea($model,'text',array('class'=>'mws-textinput')); ?>
            <?php echo $form->error($model,'text',array('class'=>'mws-error')); ?>
        </div>
    </div>
    <div class="mws-button-row">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'mws-button green')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>