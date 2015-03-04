<?php $this->pageTitle=Yii::app()->name . ' - Сообщения'; ?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Управление сообщениями</span>
    </div>
    <div class="mws-panel-body">
        <div class="mws-panel-toolbar top clearfix">
            <ul>
                <li><?php echo CHtml::link('Удалить','#',array('class'=>'mws-ic-16 ic-cross','onclick'=>'js:selectAction("delete")')); ?></li>
            </ul>
        </div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'users-grid',
    'dataProvider'=>$model->search(),
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
            'headerHtmlOptions' => array(
                'style'=>'text-align: center; width: 20px;',  
            ),
        ),
        array(
            'name'=>'id',
            'headerHtmlOptions' => array(
                'style'=>'width: 40px;'    
            ),
        ),
        'text',
        array(
            'name'=>'user_id',
            'value'=>'$data->Author->name',
        ),
        array(
            'name'=>'date_create',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->date_create,"long","short")',
            'headerHtmlOptions' => array(
                'style'=>'width: 200px;'   
            ),
        ),
        array(
            'class'=>'CButtonColumn',
            'header'=>'Действия',
            'headerHtmlOptions' => array(
                'style'=>'width: 60px;'  
            ),
            'template'=>'{edit} {delete}',
            'buttons'=>array(
                'edit' => array(
                    'url'=>'Yii::app()->createUrl("messages/update", array("id"=>$data->id))',
                    'imageUrl'=> './css/icons/16/edit.png',
                    'label'=>'Редактировать'
                ),
                'delete' => array(
                    'url'=>'Yii::app()->createUrl("messages/delete", array("id"=>$data->id))',
                    'imageUrl'=> './css/icons/16/cross.png',
                    //'visible'=>'$data->active == 1'
                ),
            ),
        ),
    ),
)); ?>        
    </div>
</div>