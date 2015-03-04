
    <div class="panel-head"><?php echo $title; ?></div>
        <div class="panel-body">
                <?php 
                    $o = false;
                    //print_r($items);
                    foreach ($items as $item):
                        if($o && $item['lvl'] == 0) { ?>
                        </ul></div>
                        <?php } ?>
                    <?php
                        if($item['lvl'] == 0) { ?>
                            <div class="btn-group">  
                            <button class="btn btn-mini"><?php echo CHtml::link($item['title'], array('site/pages', 'alias'=>$item['alias'])); ?></button>
                            <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                            <ul class="dropdown-menu"> 
                        <?php
                            $o = true;
                        } else { 
                            ?>	<li><?php echo CHtml::link($item['title'],array('site/pages','alias'=>$item['alias'])); ?></li>
                            	
                <?php } endforeach; ?> 
                            </ul>
            </div>  
        </div>