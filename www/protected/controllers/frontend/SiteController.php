<?php

class SiteController extends FrontEndController
{
	public $layout = '//layouts/main';
    
    public function actionIndex()
	{
            $pages = Pages::model()->findByType(Pages::TYPE_HOME);
            $more_pages = Pages::model()->getChilds($pages[0]->id);
//            $api = new ApiTransfer;
            $this->render('index', array(
//                'stats'=>$api->getData('stats'),
                            'pages' => $pages[0],
                            'more_pages' => $more_pages
            ));
	}
    
    public function actionPages($alias)
    {
        $model = Pages::model()->findByAlias($alias);      
		$more_pages = Pages::model()->getChilds($model->id);
        $this->render('pages', array(
            'model' => $model,
			'more_pages' => $more_pages
        ));               
    }

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
    
    public function actionAbout()
    {
        $model = Pages::model()->findByType(Pages::TYPE_ABOUT);       
        $this->render('about', array(
            'model' => $model,
        ));
    }
    
    public function actionEmerg()
    {
        $model = Pages::model()->findByType(Pages::TYPE_EMERG);       
        $this->render('emerg', array(
            'model' => $model,
        ));
    }

	public function actionTarifs()
    {
        $model = Pages::model()->findByType(Pages::TYPE_TARIFFS);       
        $this->render('tariffs', array(
            'model' => $model,
        ));
    }
    
    public function actionContacts()
    {
        $address = array();
        if (!Yii::app()->user->isGuest) {
            $model = new Messages;
            $tpl = 'contacts_user';
            if (isset($_POST['Messages'])) {
                $model->attributes=$_POST['Messages'];
                $model->user_id = Yii::app()->user->id;
                $model->date_create = time();
                if ($model->save()) {
                    $this->render('contact_done');
                    Yii::app()->end();
                }    
            }
        } else {
            $model = new Users('new');
            $tpl = 'contacts';
            if (isset($_POST['Users'])) {
                $model->attributes=$_POST['Users'];
                if($model->save()) {
    				$message = new Messages;
                    $message->attributes = array(
                        'user_id' => $model->id,
                        'text' => $model->message,
                        'date_create' => time(),
                        'status' => 'N'
                    );
                    $message->save();
                    $this->render('contact_done');
                    Yii::app()->end();
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
        }
        $this->layout = '//layouts/main';
        $this->render($tpl, array(
            'model' => $model,
            'address' => $address
        ));
    }
    
    public function actionCrash($id)
    {
//        $api = new ApiTransfer;
//        $this->render('crash', array(
//            'data'=>$api->getData('crash', array('id'=>$id)),
//        ));      
    }
    
    public function actionMap()
    {
//        $api = new ApiTransfer;
//        $crashs = $api->getData('mapcrashs');
//        if (!$crashs) {
//            $crashs = array(
//                1=>array(),
//                2=>array(),
//                3=>array(),
//                4=>array(),
//                'count'=>0
//            );    
//        }
//        $this->render('map',array(
//            'service'=>$api->getData('service'),
//            'crashs'=>$crashs,
//        ));
    }
    
    public function actionLeave()
    {
        if (Yii::app()->user->isGuest) {
            $this->render('leave_guest');
        } else {
            $model = new OrderForm;
            $address = array();
//            $api = new ApiTransfer;
            $bridges = array(array('service_id'=>0,'work_id'=>0));
            if (isset($_POST['OrderForm'])) {
                if($_POST['OrderBridge']['work_id'][0]) {
                    $model->attributes = $_POST['OrderForm'];
                    $array_service = array();
                    foreach ($_POST['OrderBridge']['service_id'] as $i => $service) {
                        if ($service != 0) {
                            $model->service[$i] = $bridges[$i]['service_id'] = $service;
                            $model->work[$i] = $bridges[$i]['work_id'] = $_POST['OrderBridge']['work_id'][$i];
                            $array_service[] = $service;
                        }                    
                    }
                    $array_service = array_unique($array_service);
                    if ($model->send()) {  
                        $this->render('leave_done');
                        Yii::app()->end();
                    } else {
                        if (isset($model->street)) {
                            $street = Street::model()->findByPk($model->street);
                            $address = array(
                                'street' => $street->name,
                                'locality' => $street->Locality->name,
                                'region' => $street->Region->name
                            ); 
                        }         
                    }
                } else {
                    $model->validate();                    
                    $model->addError('work', Yii::t('main','not_select_work'));
                }
            }
            $this->layout = '//layouts/main';
//            $service = $api->getData('service');
            $service[0] = 'Нет';
            $this->render('leave', array(
                'model' => $model,
                'address' => $address,
                'service'=>$service,
                'bridges'=>$bridges,
                'count'=>count($bridges) ? count($bridges)-1 : 0,
                'api' => $api,
            ));
        }           
    }
}