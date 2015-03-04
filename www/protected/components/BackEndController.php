<?php
 class BackEndController extends BaseController
{
    public $layout = '//layouts/main';
    public $breadcrumbs = array();
    
    public function filters()
    {   
        if(Yii::app()->user->checkAccess('admin')){
            
        }elseif(Yii::app()->user->checkAccess('runlineadmin')){
            
        }else{ 
            $this->redirect(array('site/login'));
        }
        return array('accessControl');
    }
    public function accessRules()
    {   
       return array(
            array('allow',
                  'roles'=>array('admin'),
            ),
           array('allow',
               'actions'=>array('create', 'update', 'delete', 'index'),
               'controllers'=>array('Runline'),
               'roles'=>array('runlineadmin'),
               ),
            array('deny',
                 'controllers'=>array('Messages', 'Pages', 'Settings', 'Users'),
                 'roles'=>array('runlineadmin'),
                ),
            array('deny',
                'actions'=>array('create', 'update', 'delete', 'index'),
                'controllers'=>array('Messages', 'Pages', 'Settings', 'Users', 'Runline'),
                'roles'=>array('guest'),
                ),
        ); 
    }
}