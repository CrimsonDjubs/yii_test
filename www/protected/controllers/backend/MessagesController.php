<?php

class MessagesController extends BackEndController
{    
    public function actionIndex() 
    {
        $model = new Messages;
        $this->render('index',array(
                'model'=>$model,
        ));
	}
    
    public function actionUpdate($id)
    {
        $model = Messages::model()->findByPk($id);
        $this->render('update',array(
                'model'=>$model,
        ));        
    }
    
    //public function action
}