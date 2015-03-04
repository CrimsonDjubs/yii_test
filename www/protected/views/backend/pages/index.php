<?php $this->pageTitle=Yii::app()->name . ' - Странциы'; ?>
<div class="mws-panel grid_8">
    <div class="mws-report-container clearfix">
        <?php echo CHtml::link('Добавить',array('pages/create'),array('class'=>'mws-button green')); ?>
    </div>
    <div class="mws-panel-header">
        <span class="mws-i-24 i-documents-1">Управление страницами</span>
    </div>
    <div class="mws-panel-body">
        <div class="mws-panel-content">
            <?php $this->widget('application.components.widgets.TreePages', array('model'=>$info,'type'=>Pages::TYPE_INFO)); ?>
            <br />
            <?php $this->widget('application.components.widgets.TreePages', array('model'=>$about,'type'=>Pages::TYPE_ABOUT)); ?>
            <br />
            <?php $this->widget('application.components.widgets.TreePages', array('model'=>$emerg,'type'=>Pages::TYPE_EMERG)); ?>
			<br />
			<?php $this->widget('application.components.widgets.TreePages', array('model'=>$home,'type'=>Pages::TYPE_HOME)); ?>
			<br />
			<?php $this->widget('application.components.widgets.TreePages', array('model'=>$tariffs,'type'=>Pages::TYPE_TARIFFS)); ?>
        </div>
    </div>
</div>