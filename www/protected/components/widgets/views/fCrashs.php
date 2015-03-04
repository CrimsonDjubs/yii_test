<!--<div class="box_outer">
    <div class="widget">  -->
    <div class="panel-head"><?php echo Yii::t('main','accidents_and_disabling'); ?></div>
    <div id="services-list" class="panel-body">
        <?php echo CHtml::link(CHtml::tag('span',array(),'»').Yii::t('main','On_a_map'),array('site/map'));
            foreach($data['service'] as $id => $service) {
                echo '<div>';
                echo CHtml::link(
                    CHtml::tag('span',array(),'»').$service['name'],
                    array('site/crash','id'=>$service['prefix']),
                    array('data-placement'=>'right',
                        'rel'=>'tooltip',
                        'title'=>Yii::t('main', 'accidents_and_outages_do_not')
                    ) 
                );
                if (!empty($service['works'])) {
                    $text = '<strong>'.$service['name'].'</strong><br />';
                    foreach ($service['works'] as $k => $work) {
                        $text.='<strong>'.++$k.'.</strong> '.$work.'<br />';      
                    }
                    echo '<p class="triangle-right left">'.$text.'</p>';     
                } else {
                    #echo '<p class="triangle-right left">'.Yii::t('main','accidents_and_outages_do_not').'</p>';
                }
                echo '</div>'."\n";
            }
        ?>
    </div>
<!--    </div>
</div>   -->