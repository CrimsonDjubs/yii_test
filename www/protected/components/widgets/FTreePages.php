<?php
class FTreePages extends CWidget
{
    
    public $type;
    private $ret = array();
    private $model;
    
    public function run()
    {
        $this->model = Pages::model()->findByType($this->type);
        foreach ($this->model as $item) {
            if ($item->parent == 0) {
                $this->ret[] = array(
                    'alias' => $item->alias,
                    'title' => $item->title,
                    'lvl' => 0
                );
                $this->tree($item->id);
            }              
        }
        switch ($this->type) {
            case 1: $title = Yii::t('main','helpful_information'); break;
            case 2: $title = Yii::t('main','about_1563'); break;
//            default: $title = ''; break;
        }
        $this->render('fTreePages',array(
            'title' => $title,
            'items' => $this->ret,
            'type' => $this->type
        ));
    }
    
    private function tree($pid, $lvl = 0)
    {
        $lvl++;
        foreach ($this->model as $item) {
            if ($item->parent == $pid) {
                $str = '';
                for ($i=0; $i<$lvl; $i++)
                    $str.= '-';
                $this->ret[] = array(
                    'alias' => $item->alias,
                    'title' => $item->title,
                    'lvl' => $lvl,
                    'str' => $str
                );
                $this->tree($item->id, $lvl);
            }
        }
    }
}