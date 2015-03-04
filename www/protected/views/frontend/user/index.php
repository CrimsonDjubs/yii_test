<?php $this->pageTitle = Yii::app()->name.' - '.Yii::t('main','Cabinet'); ?>
<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Cabinet'); ?></h1>
        <div class="single_article_content">
        <?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$orders,
    'cssFile' => false,
    'itemsCssClass' => 'table',
    'columns'=>array(
        array(
            'name' => 'status',
            'header' => Yii::t('main','status'),
            'value' => '$data["status"]',
        ),
        array(
            'name' => 'status',
            'header' => Yii::t('main','address'),
            'value' => '$data["address"]',
        ),
        array(
            'name' => 'status',
            'header' => Yii::t('main','service'),
            'value' => '$data["service"]',
        ),
        array(
            'name' => 'status',
            'header' => Yii::t('main','problem'),
            'value' => '$data["problem"]',
        ),
        array(
            'name' => 'status',
            'header' => Yii::t('main','date_opened'),
            'value' => '$data["date_opened"]',
        ),
        array(
            'name' => 'status',
            'header' => Yii::t('main','date_accept'),
            'value' => '$data["date_accept"]',
        ),
        array(
            'name' => 'status',
            'header' => Yii::t('main','date_remove'),
            'value' => '$data["date_remove"]',
        ),
        array(
            'name' => 'status',
            'header' => Yii::t('main','date_done'),
            'value' => '$data["date_done"]',
        ),
    ),
));        
        ?>
        </div>
    </article>
</div>