<?php

class Messages extends CActiveRecord
{
	const STATUS_NEW = 'N';
    const STATUS_READ = 'R';
    const STATUS_EDIT = 'E';
    const STATUS_SEND = 'S';
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'messages';
	}

	public function rules()
	{
		return array(
			array('text, user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('id, text, user_id, date_create, date_update, status', 'safe'),
		);
	}

	public function relations()
	{
		return array(
            'Author' => array(self::BELONGS_TO, 'Users', 'user_id'),
		);
	}
    
    public function CountNew()
    {
        return $this->countByAttributes(array('status'=>self::STATUS_NEW));
    }

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'text' => 'Текст',
			'user_id' => 'Пользователь',
            'date_create' => 'Дата создания',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}