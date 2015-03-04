<strong><?php echo $title; ?></strong><br />
<?php foreach ($items as $item): ?>
    <?php echo isset($item['str']) ? $item['str'].' ':''; ?>
    <?php echo $item['title']; ?>
    <?php echo CHtml::link(CHtml::image('./css/icons/16/edit.png'),array('pages/update','id'=>$item['id'])); ?>
    <?php echo CHtml::link(CHtml::image('./css/icons/16/add.png'),array('pages/create','pid'=>$item['id'],'type'=>$type)); ?>
    <?php echo CHtml::link(CHtml::image('./css/icons/16/cross.png'),array('pages/delete','id'=>$item['id'])); ?>
    <br />
<?php endforeach; ?>