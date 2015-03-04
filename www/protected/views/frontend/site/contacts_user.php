<?php $this->pageTitle = Yii::app()->name.' - '.Yii::t('main','Contact_center'); ?>
<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Contact_center'); ?></h1>
        <div class="single_article_content">
            <div class="contact_form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
)); ?>
        <?php echo CHtml::label(Yii::t('main','The_appeal'),'Users_message'); ?>
        <?php echo $form->textArea($model,'text'); ?>
        <?php echo $form->error($model,'text',array('class'=>'error')); ?>
        <br />
<button class="send_comment" type="submit"><?php echo Yii::t('main','Send'); ?></button>
<?php $this->endWidget(); ?>
            </div>
        </div>
    </article>
</div>