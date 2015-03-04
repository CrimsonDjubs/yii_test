<?php $this->pageTitle=Yii::app()->name . ' - Пользователи'; ?>
<script type="text/javascript">
<!--
	function selectAction(action)
    {
        var checkedInput = $("tbody").children().children(".checkbox-column").find(":checkbox:checked");
        var selectedIDs = [];
        $(checkedInput).each(function(index, data) {
            selectedIDs.push(data.value);           
        });
        if(selectedIDs.length > 0) {
            var ids = selectedIDs.join(",");
            switch (action) {
                case 'delete': var url = "<?php echo CController::createUrl('users/deletes'); ?>"; break;
            }
            $.ajax({
                "type":"GET",
                "data":{"ids":ids},
                "url":url
            });
            $.fn.yiiGridView.update('users-grid');
        } else {
            alert('Ничего не выбрано');
        }
    }
-->
</script>
<div class="mws-panel grid_8">
<!--
    <div class="mws-report-container clearfix">
        <?php echo CHtml::link('Добавить',array('users/create'),array('class'=>'mws-button green')); ?>
    </div>
-->
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1">Управление пользователями</span>
    </div>
    <div class="mws-panel-body">
<!--
        <div class="mws-panel-toolbar top clearfix">
            <ul>
                <li><?php echo CHtml::link('Удалить','#',array('class'=>'mws-ic-16 ic-cross','onclick'=>'js:selectAction("delete")')); ?></li>
            </ul>
        </div>
-->
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'users-grid',
    'dataProvider'=>$model->search(),
	'summaryText'=>'Отображаются {start}-{end} из {count} пользователя.',
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
            'name'=>'id',
            'headerHtmlOptions' => array(
                'style'=>'width: 40px;'    
            ),
        ),
        'login',    
        'name',
        'phone',
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
            'template'=>'{edit} {delete} {restore}',
            'buttons'=>array(
                'edit' => array(
                    'url'=>'Yii::app()->createUrl("users/view", array("id"=>$data->id))',
                    'imageUrl'=> './css/icons/16/view.png',
                    'label'=>'Редактировать'
                ),
                'delete' => array(
                    'url'=>'Yii::app()->createUrl("users/delete", array("id"=>$data->id))',
                    'imageUrl'=> './css/icons/16/cross.png',
                    'visible'=>'$data->active == 1'
                ),
				'restore' => array
				(
					'imageUrl'=> './css/icons/16/lock_unlock.png',
					'visible'=>'$data->active == 0',
                    'label'=>'Восстановить',
					'url'=>'Yii::app()->createUrl("users/restore", array("id"=>$data->id))',
					'click' => "function() {
						var th=this; var afterDelete=function(){}; 
						$.fn.yiiGridView.update('users-grid', { type:'POST', url:$(this).attr('href'), success:function(data) { 
							$.fn.yiiGridView.update('users-grid'); 
							afterDelete(th,true,data); }, error:function(XHR) { return afterDelete(th,false,XHR); } }); return false; }"
				),
            ),
        ),
    ),
)); ?>        
    </div>
</div>