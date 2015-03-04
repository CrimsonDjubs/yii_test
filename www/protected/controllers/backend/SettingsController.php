<?php

class SettingsController extends BackEndController
{
	public function actionIndex()
	{
        $model = new Settings;
        if(isset($_POST['Settings']))
        {
            $model->attributes = $_POST['Settings'];
            $model->save();
        }
		$this->render('index', array(
            'model'=>$model
        ));
	}
    
    public function actionLangs()
    {  
        if (isset($_POST['lang']) && isset($_POST['source']) && isset($_POST['value'])) {
            $model = new Langs;
            $model->save($_POST['lang'], array($_POST['source'] => $_POST['value'])); 
        } 
        $model = new Langs;
		$this->render('langs', array(
            'model'=>$model
        ));
    }
}