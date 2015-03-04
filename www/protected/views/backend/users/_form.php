<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'mws-form'),
)); ?>
<div class="mws-form-inline">    
    <div class="mws-form-row">
        <?php echo $form->labelEx($model,'login'); ?>
        <div class="mws-form-item small">
            <?php echo $form->textField($model,'login',array('class'=>'mws-textinput')); ?>
            <?php echo $form->error($model,'login',array('class'=>'mws-error')); ?>
        </div>
    </div>
    <div class="mws-form-row">
        <?php echo $form->labelEx($model,'name'); ?>
        <div class="mws-form-item small">
            <?php echo $form->textField($model,'name',array('class'=>'mws-textinput')); ?>
            <?php echo $form->error($model,'name',array('class'=>'mws-error')); ?>
        </div>
    </div>
    <div class="mws-form-row">
        <?php echo $form->labelEx($model,'phone'); ?>
        <div class="mws-form-item small">
            <?php echo $form->textField($model,'phone',array('class'=>'mws-textinput')); ?>
            <?php echo $form->error($model,'phone',array('class'=>'mws-error')); ?>
        </div>
    </div> 
<table>
	<tr>
        <td colspan="6">
            <?php echo CHtml::label(Yii::t('main','Street'),'Users_street_id'); ?>
            <?php
            	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name'=>'street',
                    'value'=>$address ? $address['street'] : '',
                    'sourceUrl'=>CController::createUrl('ajax/AutocompleteStreets'),
                    'htmlOptions'=>array(
                        'size'=>45
                    ),
                    'options'=>array(
                        'showAnim'=>'fold',
                        'minLength'=>'3',
                        'select' =>'js: function(event, ui) {
                            this.value = ui.item.label;
                            $("#street").val(ui.item.street);
                            $("#locality").val(ui.item.locality);
                            $("#region").val(ui.item.region);
                            $("#Users_region_id").val(ui.item.region_id);
                            $("#Users_street_id").val(ui.item.street_id);
                            return false;
                        }',
                    ),
                ));
            ?>
            <?php echo $form->error($model,'street_id',array('class'=>'error')); ?>        
        </td>
    </tr>
    <tr>
        <td>
            <?php echo CHtml::label(Yii::t('main','Locality'), 'locality'); ?>
            <?php echo CHtml::textField('locality', $address ? $address['locality'] : '', array('disabled'=>'disabled')); ?>        
        </td>
        <td>
            <?php echo CHtml::label(Yii::t('main','Region'), 'region'); ?>
            <?php echo CHtml::textField('region', $address ? $address['region'] : '', array('disabled'=>'disabled')); ?>
        </td>
        <td>
            <?php echo $form->labelEx($model, 'house'); ?>
            <?php echo $form->textField($model,'house',array('size'=>5)); ?>
            <?php echo $form->error($model,'house',array('class'=>'error')); ?>          
        </td>
        <td>   
            <?php echo $form->labelEx($model, 'housing'); ?>
            <?php echo $form->textField($model,'housing',array('size'=>5)); ?>
            <?php echo $form->error($model,'housing',array('class'=>'error')); ?>          
        </td>
        <td>
            <?php echo $form->labelEx($model, 'flat'); ?>
            <?php echo $form->textField($model,'flat',array('size'=>5)); ?>
            <?php echo $form->error($model,'flat',array('class'=>'error')); ?>     
        </td>
        <td>
            <?php echo $form->labelEx($model, 'porch'); ?>
            <?php echo $form->textField($model,'porch',array('size'=>5)); ?>
            <?php echo $form->error($model,'porch',array('class'=>'error')); ?>        
        </td>
    </tr>
</table>
<?php echo $form->hiddenField($model, 'region_id'); ?>
<?php echo $form->hiddenField($model, 'street_id'); ?>

    <div class="mws-button-row">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'mws-button green')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>