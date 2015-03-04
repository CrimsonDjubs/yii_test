<script src="http://api-maps.yandex.ru/1.1/index.xml?key=<?php echo Yii::app()->params->map_api; ?>" type="text/javascript"></script>
<div class="box_outer">
    <article class="cat_article">
        <h1 class="cat_article_title page_title"><?php echo Yii::t('main','Map'); ?></h1>
        <div class="single_article_content">
            <strong><?php echo Yii::t('main','accidents_and_disabling'); ?></strong>: <?php echo $crashs['count']; ?>
            <table class="table" cellpadding="0" cellspacing="0" style="width: 300px;">
                <tr>
                    <th style="text-align: left;"><?php echo Yii::t('main','Nakhimovsky'); ?></th>
                    <td class="ballon">
                        <?php echo count($crashs[1]); ?>
                        <?php 
                            if (!empty($crashs[1])) {
                                $text = '';
                                foreach ($crashs[1] as $k => $work) {
                                    $text.= '<strong>'.$work['service'].'</strong><br />';
                                    $text.= '<strong>'.++$k.'.</strong> '.$work['description'].'<br />';
                                }
                                echo '<p class="triangle-right left" style="left: 20px;">'.$text.'</p>';    
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left;"><?php echo Yii::t('main','Leninist'); ?></th>
                    <td class="ballon">
                        <?php echo count($crashs[2]); ?>
                        <?php 
                                if (!empty($crashs[2])) {
                                    $text = '';
                                    foreach ($crashs[2] as $k => $work) {
                                        $text.= '<strong>'.$work['service'].'</strong><br />';
                                        $text.= '<strong>'.++$k.'.</strong> '.$work['description'].'<br />';
                                    }
                                    echo '<p class="triangle-right left" style="left: 20px;">'.$text.'</p>';    
                                }
                            ?>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left;"><?php echo Yii::t('main','Gagarin'); ?></th>
                    <td class="ballon">
                        <?php echo count($crashs[3]); ?>
                        <?php 
                            if (!empty($crashs[3])) {
                                $text = '';
                                foreach ($crashs[3] as $k => $work) {
                                    $text.= '<strong>'.$work['service'].'</strong><br />';
                                    $text.= '<strong>'.++$k.'.</strong> '.$work['description'].'<br />';
                                }
                                echo '<p class="triangle-right left" style="left: 20px;">'.$text.'</p>';    
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th style="text-align: left;"><?php echo Yii::t('main','Balaklava'); ?></th>
                    <td class="ballon">
                        <?php echo count($crashs[4]); ?>
                        <?php 
                            if (!empty($crashs[4])) {
                                $text = '';
                                foreach ($crashs[4] as $k => $work) {
                                    $text.= '<strong>'.$work['service'].'</strong><br />';
                                    $text.= '<strong>'.++$k.'.</strong> '.$work['description'].'<br />';
                                }
                                echo '<p class="triangle-right left" style="left: 20px;">'.$text.'</p>';    
                            }
                        ?>
                    </td>
                </tr>
            </table>
            <div id="YMapsID" style="width:100%;height:400px"></div><br />
            <strong><?php echo Yii::t('main','Select_service'); ?></strong>
            <?php
             echo CHtml::dropDownList('service','', $service, array(
                        'ajax'=>array(
                            'type'=>'POST',
                            'data'=>array('data'=>'js:this.value'),
                            'url'=>CController::createUrl('ajax/map'),
                            'dataType'=>'json',
                            'success'=>'function(data){
                                show(data);
                            }',
                        )));
             ?>
        </div>
    </article>
</div>
<script type="text/javascript">
<!--
    var map;
    var styles;
    YMaps.jQuery(function () {
        map = new YMaps.Map(document.getElementById("YMapsID"));
        map.setCenter(new YMaps.GeoPoint(33.51, 44.58), 11);
        map.enableScrollZoom();  
        $.ajax({
            'type':'POST',
            'data':{'data':''},
            'url':'<?php echo CController::createUrl('ajax/map'); ?>',
            'dataType':'json',
            'success':function(data){
                show(data);
            },
        })   
    });
    
    function show (data)
    {
        map.removeAllOverlays()
        $.each(data, function(){
            var stylemark = new YMaps.Style();
            stylemark.iconStyle = new YMaps.IconStyle();
            stylemark.iconStyle.href = 'http://82.207.103.155/images/markers/'+this.status+'_'+this.icon;
            stylemark.iconStyle.size = new YMaps.Point(32, 37);
            stylemark.iconStyle.offset = new YMaps.Point(-16, -35);
            var placemark = new YMaps.Placemark(new YMaps.GeoPoint(this.lng, this.lat), {style: stylemark} );
            placemark.name = this.address;
            placemark.description = 'Служба: '+this.service+'<br />Тип проблемы: '+this.work+'<br />Ориентировочное время окончания работ: '+this.date;
            map.addOverlay(placemark);
        });
    }
-->
</script>