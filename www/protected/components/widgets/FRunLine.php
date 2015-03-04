<?php
class FRunLine extends CWidget
{
    
    public $limit = null;
    
    public function run()
    {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.li-scroller.1.0.js');
		$line = new RunLines;
		$data = $line->getLine();
        if (!$data) {
            $data = array();
        }
        $this->render('fRunLine',array(
            'data' => $data
        ));
    }
}