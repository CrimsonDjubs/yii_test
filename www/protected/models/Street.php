<?php

class Street extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'street';
	}

	public function rules()
	{
		return array(
			array('name', 'required'),
			array('region', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
            array('name', 'unique', 'message'=>'Улица с таким именем уже существует.'),
			array('id, region, name, locality', 'safe'),
		);
	}

	public function relations()
	{
		return array(
            'Region' => array(self::BELONGS_TO, 'Region', 'region'),
            'Locality' => array(self::BELONGS_TO, 'Locality', 'locality'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'region' => 'Район',
			'name' => 'Название',
            'locality' => 'Нас. пункт'
		);
	}
    
#    public function getNames($region = null)
#    {
#        $res = array();
#        if ($region)
#            $model = $this->findAllByAttributes(array('region'=>$region));
#        else
#            $model = $this->findAll();
#        foreach ($model as $street)
#            $res[$street->id] = $street->name;
#        return $res;
#    }
    
    public function searchAc($query)
    {
        $criteria = new CDbCriteria;
        $criteria->addSearchCondition('name',$query);
        return $this->findAll($criteria);
    }
    
#    public function getOrderItem($street, $inf_street)
#    {
#        $criteria = new CDbCriteria;
#        if ($inf_street)
#            $criteria->condition = ' id = '.$street.' OR id = '.$inf_street;
#        else
#            $criteria->condition = ' id = '.$street;
#        $model = $this->findAll($criteria);
#        return CHtml::listData($model, 'id', 'name');       
#    }
#    
#    public function getName($id)
#    {
#        $model = $this->findByPk($id);
#        return $model->name;
#    }
#    
#    public function getStreetById($id, $ids)
#    {
#        if ($id)
#        {
#            $sql = 'SELECT s.name AS street, r.name AS region, l.name AS locality,
#                       s.id AS street_id, r.id AS region_id 
#                    FROM `tbl_street` s
#                    JOIN `tbl_region` r ON s.region = r.id
#                    JOIN `tbl_locality` l ON s.locality = l.id
#                    WHERE s.id = '.$id;
#            if ($ids)
#                $sql.= ' OR s.id = '.$ids;
#            return Yii::app()->db->createCommand($sql)->queryAll();
#        } else
#            return false;
#    }
}