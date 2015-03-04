<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Управление языками</span>
    </div>
    <div class="mws-panel-body">
        <div class="dataTables_wrapper">
     <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$model->data(),
            'itemView'=>"_langs",
            'summaryText'=>'',
            'template'=>'<table class="mws-datatable-fn mws-table">
                <thead>
                    <th>Русский</th>
                    <th>Украинский</th>
                    <th>Исходной текст</th>
                </thead>
                <tbody>
                    {items}
                </tbody>
                </table>
                {pager}',
            'pagerCssClass'=>'dataTables_paginate',
            'pager'=>array(
                'header'=>false,
                'cssFile'=>false,
            ),
            'id'=>'langs-view',
            'afterAjaxUpdate'=>"function(id, data) {
                $('.ru').click(function(){
                    editLang($(this).next('td').next('td').html(),$(this).html(),'ru');
                });
                
                $('.ua').click(function(){
                    editLang($(this).next('td').html(),$(this).html(),'uk');
                }); 
            }"               
        ));     
    ?>    
        </div>
    
    </div>
</div>
<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	        'id' => 'dlg-lang',
            'themeUrl'=>Yii::app()->baseUrl.'/css',
            'theme'=>'jui',
            'cssFile'=>'jquery.ui.css',
	        'options' => array(
	            'title' => 'Редактирование',
	            'closeOnEscape' => true,
	            'autoOpen' => false,
	            'model' => false,
	            'width' => 700,
	            'height' => 250,
                'resizable' => false,
	        ),
	)) ?>
<form class="mws-form" action="<?php echo $this->createUrl('settings/langs'); ?>" method="POST">
<?php echo CHtml::hiddenField('lang',''); ?>
<?php echo CHtml::hiddenField('source',''); ?>
    <div class="mws-form-inline">
        <div class="mws-form-row">
            <?php echo CHtml::label('Значение','value'); ?>
            <div class="mws-form-item long">
                <?php echo CHtml::textArea('value','',array('class'=>'mws-textinput')); ?>
            </div>
        </div>
        <?php echo CHtml::ajaxSubmitButton(
            'Сохранить', 
            '', 
            array('type'=>'POST','success'=>'function() {$("#dlg-lang").dialog("close"); $.fn.yiiListView.update("langs-view"); }'), 
            array('class'=>'mws-button green','style'=>'margin: 0 24px;')); 
        ?>
    </div>
</form>
<?php $this->endWidget(); ?>
<?php Yii::app()->clientScript->registerScript('xxx', "
    jQuery(function($) {
        $('.ru').click(function(){
            editLang($(this).next('td').next('td').html(),$(this).html(),'ru');
        });
        
        $('.ua').click(function(){
            editLang($(this).next('td').html(),$(this).html(),'uk');
        });  
    });
    
	function editLang(source,value,lang)
    {
        $('#lang').val(lang);
        $('#source').val(source);
        $('#value').val(value);
        $('#dlg-lang').dialog('open');
    }");
?>