<?php

class AjaxController extends FrontEndController
{
    public function actionAutocompleteStreets()
    {        
        $result = array();
        if(isset($_GET['term'])) {
            $streets = Street::model()->searchAc($_GET['term']);
            foreach ($streets as $street) {
                $result[] = array(
                    'street'=>$street->name,
                    'region'=>$street->Region->name,
                    'locality'=>$street->Locality->name,
                    'street_id'=>$street->id,
                    'region_id'=>$street->Region->id,
                    'label'=>$street->name.' ('.$street->Locality->name.', '.$street->Region->name.' район)',
                ); 
            }  
            echo CJSON::encode($result);
        }     
    }
    
    public function actionMap()
    {
//        $api = new ApiTransfer;
//        $data = isset($_POST['data']) ? $_POST['data'] : null;
//        echo json_encode($api->map($data));
    }
    
    public function actionWorks()
    {
//        $api = new ApiTransfer;
//        
//        $works = $api->getData('works',array('service'=>$_POST['data']));
//        foreach ($works as $id => $name)
//            echo CHtml::tag('option',array('value'=>$id),$name,true);       
    }
}