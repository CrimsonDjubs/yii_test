<?php $this->pageTitle=Yii::app()->name . ' - Авторизация'; ?>
<div id="mws-login-wrapper">
    <div id="mws-login">
        <h1>Авторизация</h1>
        <div class="mws-login-lock">
            <img src="css/icons/24/locked-2.png" alt="" />
        </div>
        <div id="mws-login-form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'login-form',
    	'enableClientValidation'=>true,
    	'clientOptions'=>array(
    		'validateOnSubmit'=>true,
    	),
        'htmlOptions'=>array('class'=>'mws-form')
    )); ?>
            <div class="mws-form-row">
                <div class="mws-form-item large">
                    <?php echo $form->textField($model, 'username', array('class'=>'mws-login-username mws-textinput','placeholder'=>'логин')); ?>
                </div>
            </div>
            <div class="mws-form-row">
                <div class="mws-form-item large">
                    <?php echo $form->passwordField($model, 'password', array('class'=>'mws-login-password mws-textinput','placeholder'=>'пароль')); ?>
                </div>
            </div>
            <div class="mws-form-row mws-inset">
                <ul class="mws-form-list inline">
                    <li>
                        <?php echo $form->checkBox($model, 'rememberMe'); ?>
                        <?php echo $form->label($model, 'rememberMe'); ?>
                    </li>
                </ul>
            </div>
            <div class="mws-form-row">
                <?php echo CHtml::submitButton('Войти', array('class'=>'mws-button green mws-login-button')); ?>
            </div>
    <?php $this->endWidget(); ?>
        </div>
    </div>
</div>