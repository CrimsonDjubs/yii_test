<?php $this->pageTitle = Yii::app()->name.' - '.Yii::t('main','Register'); ?>
<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Register'); ?></h1>
        <div class="single_article_content">
            <div class="contact_form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
)); ?>
<table width="100%">
    <tr>
        <td colspan="4">
            <?php echo CHtml::label(Yii::t('main','Name'),'Users_name'); ?>
            <?php echo $form->textField($model,'name'); ?>
            <?php echo $form->error($model,'name',array('class'=>'error')); ?>        
        </td>
        <td colspan="2">
            <?php echo CHtml::label(Yii::t('main','Phone'),'Users_phone'); ?>
            <?php echo $form->textField($model,'phone'); ?>
            <?php echo $form->error($model,'phone',array('class'=>'error')); ?>        
        </td>
    </tr>
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
    <tr>
        <td colspan="6">   
            <?php echo $form->labelEx($model, 'login'); ?>
            <?php echo $form->textField($model,'login',array('size'=>5)); ?>
            <?php echo $form->error($model,'login',array('class'=>'error')); ?>          
        </td>    
    </tr>
<tr>
        <td colspan="6">   
            <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model,'password',array('size'=>5)); ?>
            <?php echo $form->error($model,'password',array('class'=>'error')); ?>          
        </td>    
    </tr>
</table>
<?php echo $form->hiddenField($model, 'region_id'); ?>
<?php echo $form->hiddenField($model, 'street_id'); ?>
<button class="send_comment" type="submit"><?php echo Yii::t('main','Send'); ?></button>
<?php $this->endWidget(); ?>
            </div>
        </div>
    </article>
</div>