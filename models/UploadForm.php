<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    //multiple
    // public $imageFiles;

    // public function rules()
    // {
    //     return [
    //         [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
    //     ];
    // }
    
    // public function upload()
    // {
    //     if ($this->validate()) { 
    //         foreach ($this->imageFiles as $file) {
    //             $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
    //         }
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public $imageFile;
    
        public function rules()
        {
            return [
                [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
            ];
        }
        
        public function upload()
        {
            if ($this->validate()) {
                $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
                return true;
            } else {
                return false;
            }
        }
}