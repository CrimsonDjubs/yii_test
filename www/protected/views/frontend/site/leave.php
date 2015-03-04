<?php $this->pageTitle = Yii::app()->name.' - '.Yii::t('main','Leave_a_treatment'); ?>
<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Leave_a_treatment'); ?></h1>
        <div class="single_article_content">
            <div class="contact_form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'order-form',
    'enableAjaxValidation'=>false,
)); ?>
<table width="100%">
    <tr>
        <td colspan="6">
            <?php echo CHtml::label(Yii::t('main','Street'),'OrderForm_street'); ?>
            <?php
            	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name'=>'street',
                    'id'=>'street',
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
                            $("#OrderForm_region").val(ui.item.region_id);
                            $("#OrderForm_street").val(ui.item.street_id);
                            return false;
                        }',
                    ),
                ));
            ?>
            <?php echo $form->error($model,'street',array('class'=>'error')); ?>        
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
        <td>
            <?php echo CHtml::Label(Yii::t('main','service'),'service_id'); ?>
        </td>
        <td colspan="5">
            <?php echo CHtml::label(Yii::t('main','work'),'work_id'); ?>
        </td>
    </tr>
    <?php foreach($bridges as $i => $bridge): ?>
    <tr id="bridge-<?php echo $i; ?>">
        <td class="row" colspan="1">   
            <?php echo CHtml::DropDownList("OrderBridge[service_id][$i]", $bridge['service_id'], $service, array('onChange'=>'changeWorks('.$i.')')); ?>  
        </td>
        <td class="row" colspan="5"> 
            <?php echo CHtml::dropDownList("OrderBridge[work_id][$i]", $bridge['work_id'], $api->getData('works',array('service'=>$bridge['service_id']))); ?>
            <?php echo $form->error($model, 'work',array('class'=>'error')); ?>        
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="6">
            <?php echo CHtml::link(Yii::t('main','Add_service'),'',array('id'=>'addService','class'=>'button white_b')); ?>
        </td>
    </tr>
    <tr>
        <td colspan="6">
            <?php echo $form->labelEx($model, 'message'); ?>
            <?php echo $form->textArea($model,'message'); ?>
            <?php echo $form->error($model,'message',array('class'=>'error')); ?> 
        </td>
    </tr>
</table>
<?php echo $form->hiddenField($model, 'region'); ?>
<?php echo $form->hiddenField($model, 'street'); ?>
<?php echo $form->hiddenField($model, 'lng'); ?>
<?php echo $form->hiddenField($model, 'lat'); ?>
<button class="send_comment" onclick="setLocation(this.form); return false;"><?php echo Yii::t('main','Send'); ?></button>
<?php $this->endWidget(); ?>
            </div>
        </div>
    </article>
</div>
<script src="http://api-maps.yandex.ru/1.1/index.xml?key=<?php echo Yii::app()->params->map_api; ?>" type="text/javascript"></script>
<script type="text/javascript">
<!--
	var Added = <?php echo $count; ?>;
    
    $('#addService').click(function () {
        var divCloned = $('#bridge-0').clone();      
        $('#bridge-'+(Added++)).after(divCloned);
        divCloned.attr('id', 'bridge-'+Added);
        initNewInputs(divCloned.children('.row'), Added);
    });
    
    function initNewInputs(divs, idNumber) {
        var labels = divs.children('label').get();
        for ( var i in labels )
            labels[i].setAttribute('class', 'label');      
        var inputs = divs.children('select').get();   
        for ( var i in inputs  ) {
            inputs[i].value = "";
            inputs[i].setAttribute('class', '');
            inputs[i].id = inputs[i].id.replace(/\d+/, idNumber);
            inputs[i].name = inputs[i].name.replace(/\d+/, idNumber);
        }
        $(inputs[i]).after('<a href="javascript:deleteProblem('+idNumber+')" class="button white_b"><?php echo Yii::t('main','delete'); ?></a>');
        inputs[0].setAttribute('onChange', 'changeWorks('+idNumber+')');
        var input = divs.children('input').get();
        input[0].value = "";
        input[0].id = input[0].id.replace(/\d+/, idNumber);
        input[0].name = input[0].name.replace(/\d+/, idNumber);
    }
    
    function deleteProblem(id)
    {
        $('#bridge-'+id).html('');    
    }
    
    function changeWorks(id)
    {
        $('#OrderBridge_work_id_'+id).load('<?php echo Yii::app()->createUrl('ajax/works'); ?>', {data: $('#OrderBridge_service_id_'+id).val()});    
    }
    
    function setLocation(form)
    {
        var value = 'Севастополь '+$('#street').val().replace('проспект','')+' '+$('#OrderForm_house').val();
        var geocoder = new YMaps.Geocoder(value, {results: 1});
        YMaps.Events.observe(geocoder, geocoder.Events.Load, function () {
            if (this.length()) {
                geoResult = this.get(0);
                $('#OrderForm_lng').val(this.get(0).getGeoPoint().getLng());
                $('#OrderForm_lat').val(this.get(0).getGeoPoint().getLat());
                form.submit();
                    
            }else {
                $('#OrderForm_lng').val('33.524641');
                $('#OrderForm_lat').val('44.61747');
                form.submit();
            }
        });
        YMaps.Events.observe(geocoder, geocoder.Events.Fault, function (geocoder, error) {
                $('#OrderForm_lng').val('33.524641');
                $('#OrderForm_lat').val('44.61747');
                form.submit();
        });
    }
-->
</script>