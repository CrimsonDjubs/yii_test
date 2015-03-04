<?php $this->pageTitle=Yii::app()->name . ' - Редактирование пользователя'; ?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-user">Редактирование пользователя</span>
    </div>
    <div class="mws-panel-body">
        <?php echo $this->renderPartial('_form', array('model'=>$model, 'address' => $address)); ?>    
    </div>
</div>