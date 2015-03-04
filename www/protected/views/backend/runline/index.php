
<?php $this->pageTitle=Yii::app()->name . ' - Бегущая строка'; ?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Управление бегущей строкой</span>
    </div>
    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'runline-form',
            'enableAjaxValidation'=>true,
            'htmlOptions'=>array('class'=>'mws-form'),
        )); ?>
        <div class="mws-form-inline">    
            <div class="mws-form-row">
                <?php echo CHtml::label('Значение','desc'); ?>
                <div class="mws-form-item small">
                    <?php echo CHtml::textArea('desc',$row['message'],array('class'=>'mws-textinput'));
                    ?>
                    <script>oldtext="<? echo $row['message'];?>"</script>
                </div>
            </div>
            <div class="mws-button-row">
                <?php echo CHtml::submitButton('Сохранить', array('class'=>'mws-button green')); ?>
            </div>
        </div>
		<?php $this->endWidget(); ?>

    <div class="mws-panel-body">
        <div class="dataTables_wrapper">            
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'line-grid',
    'dataProvider'=>$data,
    'summaryText'=>'Отображаются {start}-{end} из {count} сообщения.',
    'cssFile'=>false,
    'template'=>'
        <div class="dataTables_wrapper">
            {items}
            <div class="dataTables_info">{summary}</div>
            {pager}
        </div>
    ',
    'itemsCssClass'=>'mws-datatable-fn mws-table',
    'summaryCssClass'=>'dataTables_info',
    'pagerCssClass'=>'dataTables_paginate',
    'pager'=>array(
        'cssFile'=>false,
        'header'=>false,
    ),
    'columns'=>array(
        array(
            'class'=>'CCheckBoxColumn',
            'selectableRows'=>2,
            'id'=>'itemsSelected',
            'checkBoxHtmlOptions'=>array(
            'onchange'=>'updateTextArea()'
            ),
            'headerHtmlOptions' => array(
                'onchange'=>'updateTextArea()',
                'style'=>'text-align: center; width: 20px;',  
            ),
            
        ),
        array(
            'name'=>'id',
            'headerHtmlOptions' => array(
                'style'=>'width: 40px;'    
            ),
        ),
        array(
            'header'=>'Служба',
            'value'=>'$data["service"]',
        ),
        array(
            'header'=>'Адрес',
            'value'=>'$data["address"]',
        ),
        array(
            'header'=>'Время начала работ',
            'value'=>'$data["date_s"]',
        ),
        array(
            'header'=>'Время окончания работ',
            'value'=>'$data["date_f"]',
        ),
	array(
            'header'=>'Описание',
            'value'=>'$data["description"]',
        ),
    ),
));
?>    
<?php //$this->endWidget(); 
?>
        </div>
    </div>
</div>