<?php

class PagesController extends BackEndController
{       
    public function actionIndex()
	{
		$info = Pages::model()->findAllByAttributes(array('type'=>Pages::TYPE_INFO));
        $about = Pages::model()->findAllByAttributes(array('type'=>Pages::TYPE_ABOUT));
        $emerg = Pages::model()->findAllByAttributes(array('type'=>Pages::TYPE_EMERG));
		$home = Pages::model()->findAllByAttributes(array('type'=>Pages::TYPE_HOME));
		$tariffs = Pages::model()->findAllByAttributes(array('type'=>Pages::TYPE_TARIFFS));
        $this->render('index',array(
            'info'=>$info,
            'about'=>$about,
            'emerg' => $emerg,
			'home' => $home,
			'tariffs' => $tariffs
        ));
	}
    
    public function actionCreate($type = null, $pid = null)
    {
        $model = new Pages;
        if (isset($_POST['Pages'])) {
            $model->attributes = $_POST['Pages'];
            if($model->save())
                $this->redirect(array('pages/index'));
            }    
        $model->parent = isset($pid) ? $pid : 0;
        $model->type = isset($type) ? $type : 0;
        $parents = $model->getParents($model->type);
        $this->render('create',array(
            'model' => $model,
            'parents' => $parents,
        ));
     }
    
    public function actionUpdate($id)
    {   
        $model = Pages::model()->findByPk($id);
        if (isset($_POST['Pages'] )) {
            $model->attributes = $_POST['Pages'];
            if($model->save()) {    
              $this->redirect(array('pages/index'));
            }
        }
        $parents = $model->getParents($model->type);
        $this->render('update',array(
                      'model' => $model,
                      'parents' => $parents,
                     ));  
    }
    public function actionDelete($id)
    {
        Pages::model()->deleteByPk($id);
        $this->redirect(array('pages/index'));
    }
    
    public function actionParent()
    {
        $data = Pages::model()->getParents((int)$_POST['Pages']['type']);
        foreach ($data as $k => $v) {
            echo CHtml::tag('option', array('value'=>$k),CHtml::encode($v),true);
        }
    }
}