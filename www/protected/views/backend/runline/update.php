<?php $this->pageTitle=Yii::app()->name . ' - Редактирование строки'; ?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-loading-bar">Редактирование строки</span>
    </div>
    <div class="mws-panel-body">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'runline-form',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('class'=>'mws-form'),
        )); ?>
        <div class="mws-form-inline">    
            <div class="mws-form-row">
                <?php echo CHtml::label('Значение','desc'); ?>
                <div class="mws-form-item small">
                    <?php echo CHtml::textArea('desc',$model['description'],array('class'=>'mws-textinput')); ?>
                </div>
            </div>
            <div class="mws-button-row">
                <?php echo CHtml::submitButton('Сохранить', array('class'=>'mws-button green')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>