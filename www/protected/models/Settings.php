<?php
class Settings extends CFormModel
{
    private $_file;
    private $_params;
        
    public function __construct($scenario = '')
    {
        $this->_file = Yii::getPathOfAlias('application.config.params') . '.php';
        $this->_params = require $this->_file;
                
        parent::__construct($scenario);
    }
        
    public function setAttributes($values,$safeOnly=true)
    {
        foreach($values as $key => $value)
        {
            if(isset($key))
                $this->_params[$key] = $value;
        }
    }
        
        public function getAttributes($names=null)
        {
                return $this->_params;
        }
        
        public function __get($name)
        {
                if(isset($this->_params[$name]))
                        return $this->_params[$name];
                
                return parent::__get($name);
        }
        
        public function __set($name, $value)
        {
                if(isset($this->_params[$name]))
                        $this->_params[$name] = $value;
                else
                        parent::__set($name, $value);
        }
        
    public function rules()
    {
        return array(
            array(
                implode(',', array_keys($this->_params)), 'required',
                'message' => 'Не должен быть пустым.'
            )
        );
    }

	public function attributeLabels()
	{
		return array(
		);
	}

        
    public function save()
    {
        if($this->validate())
        {
            file_put_contents(
                $this->_file,
                '<?php return ' . var_export($this->_params, true) . ';'
            );
            return true;
        }
        return false;
    }
}