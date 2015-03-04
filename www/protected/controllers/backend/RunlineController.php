<?php

class RunlineController extends BackEndController
{    
    public function actionIndex() 
    {
//        $api = new ApiTransfer;
//        $data = new CArrayDataProvider($api->getData('admincrashs'),array(
//            'pagination' => array('pageSize'=>40)
//        ));
        $line = new RunLines;
        $row = $line->getLine();
        if (isset($_POST['desc'])) {
            $row->setLine($_POST['desc']);
            $this->redirect(array('runline/index'));    
        }

        $this->render('index',array(
//                'data'=>array(), //замена пустого массива
				'row'=>$row
        ));
    }
    
    public function actionUpdate($id)
    {   
//        $api = new ApiTransfer;
//        $model = $api->getData('admincrashs',array('id'=>$id));
//        if (isset($_POST['desc'])) {
//            exit;
//            $api->getData('admincrash',array('text'=>$_POST['desc'],'id'=>$id),true);
//               $this->redirect(array('runline/index'));
//        }
//        
//        $this->render('update',array(
//                'model'=>$model, 
//        ));            
    }
    
    public function actionDelete($id)
    {
//        $api = new ApiTransfer;
//        $api->getData('admincrash',array('active'=>0,'id'=>$id),true);           
    }
}