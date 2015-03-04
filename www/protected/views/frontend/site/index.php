
  <!--  <article class="cat_article">  -->
   <!--     <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Home'); ?></h1>   -->
    <!--    <div class="single_article_content">  -->
            <?php echo Yii::t('main','1563_info'); ?>
            <div class="span6">
                <h4><?php echo Yii::t('main','Statistics'); ?>:</h4>
                <?php #echo Yii::t('main','As_of_{time}_on_the_service_received_only_{total}_complaints_of_citizens,_made_{done}', array(
#                    '{time}' => date("H:00"),
#                    '{total}' => 1,//count($stat['new']) + count($stat['complete']),
#                    '{done}' => 2,//count($stat['complete'])
#                )); ?>
                <table class="table table-bordered" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th><small><?php echo Yii::t('main','Type_of_service'); ?></small></th>
                            <th><small><?php echo Yii::t('main','received'); ?></small></th>
                            <th><small><?php echo Yii::t('main','completed'); ?></small></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php // foreach ($stats as $k => $stat): ?>
                        <tr>
                            <td class="left"><?php // echo Yii::t('main', 'service_'.$k); ?></td>
                            <td><?php // echo $stat['new']; ?></td>
                            <td><?php // echo $stat['complete']; ?></td>
                        </tr>                 
                    <?php // endforeach; ?>
                    </tbody>
                </table>
                <div class="single_article_content">
                        <p><?php echo $pages->text; ?></p>
                        <?php
                        foreach($more_pages as $item)  {
                        ?>
                        <p><?php echo CHtml::link($item['title'],array('site/pages','alias'=>$item['alias'])); ?></p>
                        <?
                        } 
                        ?>
                </div>
            </div>
            <div class="span5">
                <div id="weather-informer">
                    <a href="http://clck.yandex.ru/redir/dtype=stred/pid=7/cid=1228/*http://pogoda.yandex.ru/sevastopol" target="_blank"><img src="http://info.weather.yandex.net/sevastopol/3_white.ru.png" border="0" alt=""/><img width="1" height="1" src="http://clck.yandex.ru/click/dtype=stred/pid=7/cid=1227/*http://img.yandex.ru/i/pix.gif" alt="" border="0"/></a>
                </div>
                <table cellpadding=7 cellspacing=0>  
                    <tr>
                        <th colspan="2"><u><?php echo Yii::t('main','phones_service'); ?></u></th>
                    </tr>
                    <tr>
                            <td><?php echo Yii::t('main','p101'); ?></td>
                            <td>101</td>
                    </tr>
                    <tr>
                            <td><?php echo Yii::t('main','p102'); ?></td>
                            <td>102</td>
                    </tr>
                    <tr>
                            <td><?php echo Yii::t('main','p103'); ?></td>
                            <td>103</td>
                    </tr>
                    <tr>
                            <td><?php echo Yii::t('main','p104'); ?></td>
                            <td>104</td>
                    </tr>
                </table>
                <table cellpadding=7 cellspacing=0>
                    <tr>
                            <td><?php echo Yii::t('main','p543431'); ?></td>
                            <td>54-34-31</td>
                    </tr>
                    <tr>
                            <td><?php echo Yii::t('main','p543397'); ?></td>
                            <td nowrap>54-33-97</td>
                    </tr>
                </table>
			<br /><br />
                <div align="center"><h4><?php echo Yii::t('main','service_1563_in_operation'); ?></h4></div>
                <?php echo CHtml::image('/images/home.jpg'); ?>
            </div>
  <!---  </article>   -->
<?php 
Yii::t('main','service_water');
Yii::t('main','service_energy');
Yii::t('main','service_heat');
Yii::t('main','service_gas');
Yii::t('main','service_rap');
Yii::t('main','service_other');
?>