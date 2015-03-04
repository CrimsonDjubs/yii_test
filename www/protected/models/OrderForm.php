<?php

class OrderForm extends CFormModel
{
    public $house;
    public $street;
    public $service;
    public $work;
    public $region;
    public $flat;
    public $housing;
    public $porch;
    public $message;
    public $lng;
    public $lat;
    

	public function rules()
	{
		return array(
			array('street, house, service, work, region', 'required'),
			array('flat, housing, porch, message, lng, lat', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'street' => Yii::t('main','Street'),
			'house' => Yii::t('main','House'),
            'porch' => Yii::t('main','Porch'),
            'message' => Yii::t('main','The_appeal'),
            'flat' => Yii::t('main','Flat'),
            'housing' => Yii::t('main','Housing'),
            'work' => Yii::t('main','work'),
            'service' => Yii::t('main','service'),
		);
	}
    
    public function send()
    {
        if ($this->validate()) {
            $res['user_id'] = Yii::app()->user->id;
            $user = Users::model()->findByPk(Yii::app()->user->id);
            $res['informer'] = $user->name;
            $res['phone'] = $user->phone;
            $res['informer_region'] = $user->region_id;
            $res['informer_street'] = $user->street_id;
            $res['informer_house'] = $user->house;
            $res['informer_housing'] = $user->housing;
            $res['informer_flat'] = $user->flat;
            $res['informer_porch'] = $user->porch;
            foreach ($this as $k => $v) {
                $res[$k] = $v;    
            }
//            $api = new ApiTransfer;
//            $res = $api->getData('addorder',$res,true);
            return true;
        } else {
            return false;
        }  
             
    }
}