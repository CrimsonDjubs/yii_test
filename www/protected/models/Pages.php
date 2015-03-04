<?php
class Pages extends CActiveRecord
{       
        public $value;
        public $image;
        public $text;
	const TYPE_INFO = 1;
        const TYPE_ABOUT = 2;
        const TYPE_EMERG = 3;
	const TYPE_HOME = 4;
	const TYPE_TARIFFS = 5;
    
    private $_model;
    private $_ret = array();
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'pages';
	}

	public function rules()
	{
		return array(
			array('parent, alias, type', 'required'),
                        array('type', 'in', 'range'=>array(1,2,3,4,5)),
                        array('alias', 'unique'),
			array('parent, type', 'numerical', 'integerOnly'=>true),
			array('title, alias', 'length', 'max'=>255),
			array('id, parent, title, alias, text, type, title_ua, text_ua', 'safe'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent' => 'Parent',
			'title' => 'Заголовок',
            'title_ua' => 'Заголовок',
			'alias' => 'Адрес',
			'text' => 'Текст',
            'text_ua' => 'Текст',
			'type' => 'Тип',
		);
	}
    
    public function findByType($type)
    {
        $model = $this->findAllByAttributes(array('type'=>$type));
        switch (Yii::app()->language) {
            case 'uk':
                foreach ($model as $k => $item) {
                    $model[$k]->title = $item->title_ua;
                    $model[$k]->text = $item->text_ua;
                }
                break;
            case 'ru': break;
            default: break;
        }
        return $model;        
    }
    
    public function findByAlias($alias)
    {
        $model = $this->findByAttributes(array('alias'=>$alias));
        switch (Yii::app()->language) {
            case 'uk':
                $model->title = $model->title_ua;
                $model->text = $model->text_ua;
                break;
            case 'ru': break;
            default: break;
        }
        return $model;
    }
    
    public function getParents($type)
    {
        $this->_model = $this->findAllByAttributes(array('type'=>$type));
        $this->_ret[0] = 'Нет';
        foreach ($this->_model as $item) {
            if ($item->parent == 0) {
                $this->_ret[$item->id] = $item->title;
                $this->tree($item->id);
            }              
        }
        return $this->_ret;               
    }

	public function getChilds($id) {
		$this->_model = $this->findAllByAttributes(array('parent'=>$id));
		$this->_ret = array();
		foreach($this->_model as $item) {
			switch (Yii::app()->language) {
				case 'uk':
					$item->title = $item->title_ua;
					$item->text = $item->text_ua;
				break;
				default: break;
			}
			$this->_ret[] = $item;
		}
		return $this->_ret;
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
    private function tree($pid, $lvl = 0)
    {
        $lvl++;
        foreach ($this->_model as $item) {
            if ($item->parent == $pid) {
                $str = '';
                for ($i=0; $i<$lvl; $i++) $str.= '-';
                $this->_ret[$item->id] = $str.' '.$item->title;
                $this->tree($item->id, $lvl);
            }
        }
    } 
    
}
