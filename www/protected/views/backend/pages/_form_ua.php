    <div class="mws-form-row">
        <?php echo $form->labelEx($model,'title_ua'); ?>
        <div class="mws-form-item small">
            <?php echo $form->textField($model,'title_ua',array('class'=>'mws-textinput')); ?>
            <?php echo $form->error($model,'title_ua',array('class'=>'mws-error')); ?>
        </div>
    </div>
    <div class="mws-form-row">
        <?php echo $form->labelEx($model,'text_ua'); ?>
        <div class="mws-form-item small">
            <?php echo $form->textArea($model,'text_ua', array('style'=>'width: 90%; height: 500px;')); ?>
            <?php $this->widget('application.extensions.imperaviRedactor.EImperaviRedactorWidget',array(
                    'model'=>$model,
                    'attribute'=>'text_ua',
                    'options'=>array(
                        'lang'=>'ru',
                        'toolbar'=>'classic',
                        'cssPath'=>Yii::app()->baseUrl.'/css/',
                        'image_upload'=>CHtml::normalizeURL(array('redactor/'))
                    ),
                ));   
          ?>
            <?php echo $form->error($model,'text_ua',array('class'=>'mws-error')); ?>
        </div>
    </div>