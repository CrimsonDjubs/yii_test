<?php $this->pageTitle=Yii::app()->name . ' - Ошибка'; ?>
<div id="mws-error-container">
    <div id="mws-error-code"><h1>Ошибка <span><?php echo $code; ?></span></h1></div>
    <p id="mws-error-message"><?php echo CHtml::encode($message); ?></p>
</div>