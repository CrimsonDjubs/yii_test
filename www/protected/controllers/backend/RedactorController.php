<?php

class RedactorController extends CController
{
    public function run($actionID) {
    
    if(!empty($_FILES['file']['name'])&&!Yii::app()->user->isGuest)
		{
                    $dir = './images/upload/';
                    if(!is_dir($dir))
                    @mkdir($dir,'0777', true);

                    $image=CUploadedFile::getInstanceByName('file');
                        if ($image) {
                            $new_name = md5(time()).'.'.$image->extensionName;
                            $image->saveAs($dir.$new_name);
                            echo '/images/upload/'.$new_name;
                        }
                }
    }
    
}