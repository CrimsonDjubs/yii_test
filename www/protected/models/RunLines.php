<?php
class RunLines extends CActiveRecord {
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'runline';
	}

	public function getLine()
        {           
            //ищет прямо в базе
            
            $model=$this->find('record_id =1');
            return $model;        
        }

	public function setLine($message) 
        {   
            
            //сохраняем в базу значение из 'desc'
            $this->message = $message;
            $this->update();
            
	}
}