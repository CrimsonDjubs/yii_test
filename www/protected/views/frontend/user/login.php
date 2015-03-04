<?php $this->pageTitle = Yii::app()->name.' - '.Yii::t('main','Login'); ?>
<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Login'); ?></h1>
        <div class="single_article_content">
            <div class="contact_form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableAjaxValidation'=>false,
)); ?>
<table width="100%">
    <tr>
        <td>
            <?php echo CHtml::label(Yii::t('main','Users_login'),'Users_name'); ?>
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username',array('class'=>'error')); ?>        
        </td>
    </tr>
    <tr>
        <td>
            <?php echo CHtml::label(Yii::t('main','Users_password'),'Users_password'); ?>
            <?php echo $form->passwordField($model,'password'); ?>
            <?php echo $form->error($model,'password',array('class'=>'error')); ?>        
        </td>
    </tr>
    </tr>
</table>
<?php echo CHtml::link(Yii::t('main','register'), array('user/register')); ?><br />
<button class="send_comment" type="submit"><?php echo Yii::t('main','Enter'); ?></button>
<?php $this->endWidget(); ?>
            </div>
        </div>
    </article>
</div>
<!--
<?php echo $form->checkBox($model, 'rememberMe'); ?>
<?php echo $form->label($model, 'rememberMe'); ?>
-->