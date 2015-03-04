<?php $this->pageTitle = Yii::app()->name.' - '.Yii::t('main','Access_error'); ?>
<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Access_error'); ?></h1>
        <div class="single_article_content">
        <p><?php echo Yii::t('main','leave_register'); ?></p>
        <?php echo CHtml::link(Yii::t('main','register'), array('user/register')); ?>
        </div>
    </article>
</div>