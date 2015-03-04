<?php $this->pageTitle = Yii::app()->name.' - '.Yii::t('main','Error'); ?>
<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Error').' '.$code; ?></h1>
        <div class="single_article_content">
        <p><?php echo $message; ?></p>
        </div>
    </article>
</div>