<?php $this->pageTitle.=$model->title; ?>
<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo $model->title; ?></h1>
        <div class="single_article_content">
        <p><?php echo $model->text; ?></p>
        </div>
		<?php
		foreach($more_pages as $item)  {
		?>
			<p><?php echo CHtml::link($item['title'],array('site/pages','alias'=>$item['alias'])); ?></p>
		<?
		} 
		?>
    </article>

</div>