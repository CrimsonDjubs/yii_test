<?php $this->pageTitle=Yii::app()->name . ' - Создание страницы'; ?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-document">Создание страницы</span>
    </div>
    <div class="mws-panel-body">
        <?php echo $this->renderPartial('_form',  array('model'=>$model,'parents'=>$parents)); ?>    
    </div>
</div>