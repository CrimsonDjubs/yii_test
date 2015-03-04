<?php $this->pageTitle=Yii::app()->name . ' - Просмотр пользователя'; ?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-user">Просмотр пользователя</span>
    </div>
    <div class="mws-panel-body">
        

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'mws-form'),
	'action' => '?r=users/index'
)); ?>
<div class="mws-form-inline">    
    <div class="mws-form-row">
	<?php echo CHtml::label(Yii::t('main','Login'),'Users_login'); ?>
        <div class="mws-form-item small"><?php echo $model->login;?></div>
    </div>
    <div class="mws-form-row">
		<?php echo CHtml::label(Yii::t('main','Name'),'Users_name'); ?>
        <div class="mws-form-item small"><?php echo $model->name; ?></div>
    </div>
    <div class="mws-form-row">
		<?php echo CHtml::label(Yii::t('main','Phone'),'Users_phone'); ?>
        <div class="mws-form-item small"><?php echo $model->phone; ?></div>
    </div> 
	<div class="mws-form-row">
        <?php echo CHtml::label(Yii::t('main','Street'),'Users_street_id'); ?>
        <div class="mws-form-item small"><?php echo $address['street']; ?></div>
    </div> 
	<div class="mws-form-row">
        <?php echo CHtml::label(Yii::t('main','Locality'), 'locality'); ?>
        <div class="mws-form-item small"><?php echo $address['locality']; ?></div>
    </div> 
	<div class="mws-form-row">
        <?php echo CHtml::label(Yii::t('main','Region'), 'region'); ?>
        <div class="mws-form-item small"><?php echo $address['region']; ?></div>
    </div> 
	<div class="mws-form-row">
        <?php echo CHtml::label(Yii::t('main','House'),'Users_house'); ?>
        <div class="mws-form-item small"><?php echo $model->house; ?></div>
    </div> 
	<div class="mws-form-row">
        <?php echo CHtml::label(Yii::t('main','Housing'),'Users_housing'); ?>
        <div class="mws-form-item small"><?php echo $model->housing; ?></div>
    </div> 
	<div class="mws-form-row">
        <?php echo CHtml::label(Yii::t('main','Flat'),'Users_flat'); ?>
        <div class="mws-form-item small"><?php echo $model->flat; ?></div>
    </div> 
	<div class="mws-form-row">
        <?php echo CHtml::label(Yii::t('main','Porch'),'Users_porch'); ?>
        <div class="mws-form-item small"><?php echo $model->porch; ?></div>
    </div> 

    <div class="mws-button-row">
        <?php echo CHtml::submitButton('Вернуться', array('class'=>'mws-button green')); ?>
    </div>
</div>
    </div>
</div>
<?php $this->endWidget(); ?>