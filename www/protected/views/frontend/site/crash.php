<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo $data['name']; ?></h1>
        <div class="single_article_content">
            <table width="100%">
                <thead>
                    <tr>
                        <th><?php echo Yii::t('main','type'); ?></th>
                        <th><?php echo Yii::t('main','address'); ?></th>
                        <th><?php echo Yii::t('main','date_start'); ?></th>
                        <th><?php echo Yii::t('main','date_finish'); ?></th>
                        <th><?php echo Yii::t('main','description'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($data['works'])): ?>
                <?php foreach ($data['works'] as $work): ?>
                    <tr>
                        <td><?php echo $work['type'] == 2 ? Yii::t('main','planned_work') : Yii::t('main','accident'); ?></td>
                        <td><?php echo $work['address']; ?></td>
                        <td><?php echo $work['date_s']; ?></td>
                        <td><?php echo $work['date_f']; ?></td>
                        <td><?php echo $work['description']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;"><?php echo Yii::t('main','accidents_and_outages_do_not'); ?>  </td>
                    </tr>  
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </article>
</div>