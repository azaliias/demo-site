<?php

namespace app\models;

use Yii;

/**
 * General class
 */
class GeneralModel extends \yii\db\ActiveRecord
{
    const HIDDEN = 0;
    const VISIBLE = 1;

    /**
     * Метод, возвращающий список объектов массивом вида ключ - значение
     * return array
     */
    public static function getList($id = 'id', $title = 'title') {
        $all = self::find()->all();
        return yii\helpers\BaseArrayHelper::map($all, $id, $title);
    }
    
    /**
     * Поиск объекта по ссылке
     */
    public static function findBySlug($slug) {
        $model = self::findOne(['slug' => $slug]);
        if ($model) {
            return $model;
        }else {
            throw new \yii\web\HttpException(404, 'Страница не найдена');
        }
    }
    
    public static function getVisibleOptions() {
        return [
            self::VISIBLE => 'Видимый',
            self::HIDDEN => 'Скрытый',
        ];
    }

    public static function resize($w, $h, $path) {

        if ($path) {
            $file = Yii::getAlias('@webroot') . $path;
            $stopList = ['svg'];

            if (!file_exists($file)) {
                $file = Yii::getAlias('@webroot') . '/images/no-image.png';
            } elseif (in_array(pathinfo($file, PATHINFO_EXTENSION), $stopList)) {
                return $path;
            }

            return \himiklab\thumbnail\EasyThumbnailImage::thumbnailFileUrl(
                $file,
                $w,
                $h,
                \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_INSET_BOX,
                100
            );
        }

        return '/images/no-image.png';

    }

}