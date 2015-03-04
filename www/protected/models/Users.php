<?php

class Users extends CActiveRecord
{
	public $message;
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'users';
	}

	public function rules()
	{
		return array(
			array('name, phone, street_id, house', 'required'),
            array('name, phone, street_id, house, message', 'required', 'on'=>'new'),
			array('date_create, date_login, active, street_id, house', 'numerical', 'integerOnly'=>true),
            array('login', 'unique'),
			array('login, name, phone', 'length', 'max'=>255),
			array('password', 'length', 'max'=>32),
			array('role', 'length', 'max'=>50),
			array('id, login, password, name, role, phone, date_create, date_login, active, street_id, house', 'safe', 'on'=>'search'),
            array('region_id, housing, flat, porch', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}
    
    public function beforeSave()
    {
		if(parent::beforeSave()) {
			if($this->isNewRecord) {
				$this->date_create = time();
                $this->password = $this->password ? $this->password : substr(md5(time()),0,7);
                $this->login = $this->login ? $this->login : substr(md5(time()),0,7);
                $this->active = 1;
			}
            $this->password = md5($this->password);
			return true;
		} else {
			return false;
        }
    }

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('main','ID'),
			'login' => Yii::t('main','Login'),
			'password' => Yii::t('main','Password'),
			'name' => Yii::t('main','Name'),
			'role' => Yii::t('main','Role'),
			'phone' => Yii::t('main','Phone'),
			'date_create' => Yii::t('main','Date_create'),
			'date_login' => Yii::t('main','Date_login'),
			'active' => Yii::t('main','Active'),
			'street_id' => Yii::t('main','Street'),
			'house' => Yii::t('main','House'),
            'porch' => Yii::t('main','Porch'),
            'message' => Yii::t('main','The_appeal'),
            'flat' => Yii::t('main','Flat'),
            'housing' => Yii::t('main','Housing')
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('date_create',$this->date_create);
		$criteria->compare('date_login',$this->date_login);
		$criteria->compare('active',$this->active);
		$criteria->compare('street_id',$this->street_id);
		$criteria->compare('house',$this->house);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}