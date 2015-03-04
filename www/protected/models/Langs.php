<?php
class Langs extends CFormModel
{
    private $_ru;
    private $_uk;
    private $_langs;
    private $_preg = "/\\Yii::t\(\'main','([a-z0-9_ ]+)'/i";
        
    public function __construct($scenario = '')
    {
        $this->_ru = require Yii::getPathOfAlias('application.messages.ru.main') . '.php';
        $this->_uk = require Yii::getPathOfAlias('application.messages.uk.main') . '.php';
        $this->_langs = $this->_ru;
                
        parent::__construct($scenario);
    }
        
    public function setAttributes($values,$safeOnly=true)
    {
        foreach($values as $key => $value)
        {
            if(isset($key))
                $this->_langs[$key] = $value;
        }
    }
        
    public function getAttributes($names=null)
    {
        return $this->_langs;
    }
        
    public function __get($name)
    {
        if(isset($this->_langs[$name]))
            return $this->_langs[$name];
        return parent::__get($name);
    }
        
    public function __set($name, $value)
    {
        if(isset($this->_langs[$name]))
            $this->_langs[$name] = $value;
        else
            parent::__set($name, $value);
    }
        
    public function rules()
    {
        return array(
            array(
                implode(',', array_keys($this->_langs)), 'required',
                'message' => 'Не должен быть пустым.'
            )
        );
    }
        
    public function save($lang, $values)
    {
        if($this->validate())
        {
            $mlang = '_'.$lang;
            $langs = array_merge($this->{$mlang}, $values);
            file_put_contents(
                Yii::getPathOfAlias('application.messages.'.$lang.'.main').'.php',
                '<?php return '.var_export($langs, true).';'
            );
            return true;
        }
        return false;
    }
    
	public function data()
	{
		global $_SERVER;
        $data = $finded = array();
        $paths = array(
            'protected/controllers/frontend',
            'protected/models',
            'protected/views/frontend', 
            'protected/components/widgets'  
        );
        foreach ($paths as $v) {
            $fullpath = $_SERVER['DOCUMENT_ROOT'].'/'.$v;
            //$fullpath = 'D:/Projects/mes/'.$v;
            if (is_dir($fullpath)) {
                $finded = array_merge($finded, $this->findPath($fullpath));
            } else {
                $str = file_get_contents($fullpath);
                if ($str !== false && preg_match_all($this->_preg, $str, $matches)) {
                    $finded = array_merge($finded, array_values($matches[1]));
                }
            }
        }
        $finded = array_unique($finded);
        $i = 1;
        foreach ($finded as $v) {
            $data[] = (object) array(
                'id' => $i++,
                'ua' => isset($this->_uk[$v]) ? $this->_uk[$v] : '',
                'ru' => isset($this->_ru[$v]) ? $this->_ru[$v] : '',
                'source' => $v
            );
        }
        return new CArrayDataProvider($data,array(
            'pagination' => array('pageSize'=>40)
        ));
	}
    
    private function findPath($path)
    {
        if (is_file($path)) return array();
        $finded = array();
        $d = dir($path);
        while (false !== ($entry = $d->read())){
            if ($entry=='.' || $entry=='..') continue;
            if (is_dir($path.'/'.$entry)) {
                $finded = array_merge($finded, $this->findPath($path.'/'.$entry));    
            }
            if (preg_match("/\.(php)$/i", $entry)) {
                $str = file_get_contents($path.'/'.$entry);
                if ($str !== false && preg_match_all($this->_preg, $str, $matches)){
                    $finded = array_merge($finded, array_values($matches[1]));
                }
            }
        }
        return $finded;
    }
}