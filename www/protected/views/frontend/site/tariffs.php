<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Tarrifs'); ?></h1>
        <div class="single_article_content">
        <?php foreach ($model as $link): ?>
            <?php echo CHtml::link($link->title,array('site/pages','alias'=>$link->alias)); ?><br />
        <?php endforeach; ?>
        </div>
    </article>
</div>