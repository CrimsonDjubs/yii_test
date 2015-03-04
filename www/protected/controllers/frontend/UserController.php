<?php

class UserController extends FrontEndController
{
	public $layout = '//layouts/main';
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index', 'login', 'register'),
                'users'=>array('*'),
            ),
            array('allow',
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionIndex()
	{
        if (Yii::app()->user->isGuest) {
            $this->redirect(array('user/login'));
        }
//        $api = new ApiTransfer;
//        $orders = $api->getData('getorder',array('user_id'=>Yii::app()->user->id));
//        $this->render('index',array(
//            'orders'=>new CArrayDataProvider($orders)
//        ));
	}
    
    public function actionLogin()
    {
        $model = new LoginForm;
        if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(array('user/index'));
		}
        $this->render('login',array('model'=>$model));
    }
    
    public function actionRegister()
    {
        $model = new Users();
        $address = array();
        if (isset($_POST['Users'])) {
            $model->attributes=$_POST['Users'];
            if($model->save()) {
                $this->redirect(array('site/index')); 
            } else {
                if (isset($model->street_id)) {
                    $street = Street::model()->findByPk($model->street_id);
                    $address = array(
                        'street' => $street->name,
                        'locality' => $street->Locality->name,
                        'region' => $street->Region->name
                    ); 
                }              
            } 
        }
        $this->render('register', array(
            'model' => $model,
            'address' => $address
        ));   
    }
    
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}