<?php

namespace frontend\models;


use noam148\imagemanager\models\ImageManager;

class ImageOverride
{
    public static function getPath($img_id, $width = 400, $height = 400, $thumbnailMode = "outbound")
    {
        $i_man = ImageManager::findOne($img_id);
        if ($i_man != null) {
            $dir_path = $_SERVER['DOCUMENT_ROOT'] . '/backend/web/imagemanager/';
            $extension = pathinfo($i_man->fileName, PATHINFO_EXTENSION);
            $file_path = $dir_path . $i_man->id . '_' . $i_man->fileHash . '.' . $extension;

            return \Yii::$app->imageresize->getUrl($file_path, $width, $height, $thumbnailMode, null, $i_man->fileName);
        } else {
            return '';
        }
    }
}