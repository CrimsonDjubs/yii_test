<?php

class Locality extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'locality';
	}

	public function rules()
	{
		return array(
			array('name, region', 'required'),
			array('region', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('id, name, region', 'safe'),
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
			'region' => 'Район',
		);
	}
    
#    public function getRegion($id)
#    {
#        $sql = 'SELECT r.id, r.name
#                FROM `tbl_locality` l
#                JOIN `tbl_region` r ON l.region = r.id
#                WHERE l.id = '.$id;
#        return Yii::app()->db->createCommand($sql)->queryAll();      
#    }
#    
#    public function getLocality($id)
#    {
#        $sql = 'SELECT l.name
#                FROM `tbl_locality` l
#                JOIN `tbl_street` s ON l.id = s.locality
#                WHERE s.id = '.$id;
#        return Yii::app()->db->createCommand($sql)->queryRow();
#    }
}