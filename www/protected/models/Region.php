<?php

class Region extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'region';
	}

	public function rules()
	{
		return array(
			array('name', 'required'),
            array('name', 'unique', 'message'=>'Район с таким именем уже существует.'),
			array('name', 'length', 'max'=>255),
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
			'name' => 'Название',
		);
	}
    
#    public function getNames()
#    {
#        $model = $this->findAll();
#        $res = array();
#        foreach ($model as $region)
#            $res[$region->id] = $region->name;
#        asort($res);
#        return $res;    
#    }
#    
#    public function getOrderItem($region, $inf_region)
#    {
#        $criteria = new CDbCriteria;
#        if ($inf_region)
#            $criteria->condition = ' id = '.$region.' OR id = '.$inf_region;
#        else
#            $criteria->condition = ' id = '.$region;
#        $model = $this->findAll($criteria);
#        return CHtml::listData($model, 'id', 'name');       
#    }
}