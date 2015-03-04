<?php

class UsersController extends BackEndController
{    
    public function actionIndex() 
    {
        $model = new Users;
        $this->render('index',array(
                'model'=>$model,
        ));
	}
    
    public function actionCreate() 
    {
        $model = new Users;
        if(isset($_POST['Users']))
        {
            $model->attributes=$_POST['Users'];
            
            if($model->save())
                $this->redirect(array('index'));
        } 
        $this->render('create', array(
                'model'=>$model,
        ));
    }
    
    public function actionUpdate($id) 
    {
        $model = Users::model()->findByPK($id);
		if (isset($model->street_id)) {
			$street = Street::model()->findByPk($model->street_id);
			$address = array(
				'street' => $street->name,
				'locality' => $street->Locality->name,
				'region' => $street->Region->name
			); 
		}
        if(isset($_POST['Users']))
        {
            $model->attributes=$_POST['Users'];
            
            if($model->save())
                $this->redirect(array('index'));
        } 
        $this->render('update', array(
                'model'=>$model,
				'address' => $address
        ));
    }

	public function actionView($id) 
    {
        $model = Users::model()->findByPK($id);
		if (isset($model->street_id)) {
			$street = Street::model()->findByPk($model->street_id);
			$address = array(
				'street' => $street->name,
				'locality' => $street->Locality->name,
				'region' => $street->Region->name
			); 
		}
        $this->render('view', array(
                'model'=>$model,
				'address' => $address
        ));
    }
    
    public function actionDelete($id)
    {
        $model = Users::model()->findByPk($id);
        if ($model) {
            $model->active = 0;
            $model->save();    
        }
    }
    
    public function actionRestore($id)
    {
        $model = Users::model()->findByPk($id);
        if ($model) {
            $model->active = 1;
            $model->save();
            
        }
    }
}