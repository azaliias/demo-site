<?php
namespace app\widgets;

use app\models\GeneralModel;

class Social extends \yii\bootstrap\Widget
{

    public $white;

    public function init()
    {
        $white = $this->white;
        parent::init();
    }

    public function run()
    {
        $social = \app\models\Social::find()
            ->where(['visible' => GeneralModel::VISIBLE])
            ->orderBy('sort')
            ->all();
        if($this->white) return $this->render('social-white', ['social' => $social]);
        return $this->render('social', ['social' => $social]);
    }
}
