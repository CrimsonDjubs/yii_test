<?php
class TreePages extends CWidget
{
    
    public $model;
    public $type;
    private $ret = array();
    
    public function run()
    {
        foreach ($this->model as $item) {
            if ($item->parent == 0) {
                $this->ret[] = array(
                    'id' => $item->id,
                    'title' => $item->title,
                    'lvl' => 0
                );
                $this->tree($item->id);
            }              
        }
        switch ($this->type) {
            case 1: $title = 'Полезная информация'; break;
            case 2: $title = 'О службе 1563'; break;
            case 3: $title = 'Аварийные службы'; break;
			case 4: $title = 'Отчеты за неделю'; break;
			case 5: $title = 'Тарифы'; break;
            default: $title = ''; break;
        }
        $this->render('treePages',array(
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
                    'id' => $item->id,
                    'title' => $item->title,
                    'lvl' => $lvl,
                    'str' => $str
                );
                $this->tree($item->id, $lvl);
            }
        }
    }
}