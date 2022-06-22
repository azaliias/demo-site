<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%menu_item}}".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property int $visible
 * @property string $type
 * @property string $slug
 * @property string $link
 * @property int $sort
 *
 * @property MenuItem $parent
 * @property MenuItem[] $menuItems
 */
class MenuItem extends GeneralModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%menu_item}}';
    }

    public function behaviors()
    {
        return [
            'sortable' => [
                'class' => \kotchuprik\sortable\behaviors\Sortable::className(),
                'query' => self::find(),
                'orderAttribute' => 'sort',
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'visible', 'sort'], 'integer'],
            [['title'], 'required'],
            [['title', 'type', 'slug', 'link'], 'string', 'max' => 250],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => MenuItem::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent'),
            'title' => Yii::t('app', 'Title'),
            'visible' => Yii::t('app', 'Visible'),
            'type' => Yii::t('app', 'Type'),
            'slug' => Yii::t('app', 'Slug'),
            'link' => Yii::t('app', 'Link'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(MenuItem::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(MenuItem::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getMenuItems()
//    {
//        return $this->hasMany(MenuItem::className(), ['parent_id' => 'id']);
//    }
    
    /**
     * Формирует и возвращает хлебные крошки
     */
    public function getBreadcrumbs()
    {
        $elem = $this;
        $bc = [];
        $bc[] = $elem->title;
        while ($elem->parent) {
            $elem = $elem->parent;
            $bc[] = [
                'label' => $elem->title, 'url' => ['view', 'id' => $elem->id]
            ];
        }
        $bc[] = ['label' => Yii::t('app', 'Menu Items'), 'url' => ['index']];
        krsort($bc);
        return $bc;
    }
    
    /**
     * Возвращает список элементов без себя
     */
    public function getItemsListWithoutMe()
    {
        $query = self::find()->where(['parent_id' => null])->andWhere(['visible' => GeneralModel::VISIBLE]);
        if ($this->isNewRecord)
            $all = $query->orderBy('sort')->all();
        else
            $all = $query->andWhere(['<>', 'id', $this->id])->orderBy('sort')->all();
        return yii\helpers\BaseArrayHelper::map($all, 'id', 'title');
    }
    
    /**
     * Формирует меню для виджета
     * @param boolean $homePage выводить ли домашнюю страницу
     * @param integer $root если задан - id элемента-родителя
     */
    public static function getMenu($homePage = true, $root = null)
    {
        $items = [];
        $controllerId = Yii::$app->controller->id;
        $method = Yii::$app->controller->action->id;
        $slug = Yii::$app->request->get('slug');
        if ($homePage) {
            $items[] = ['label' => 'Home', 'url' => ['/'], 'active' => ($controllerId == 'site' && $method == 'index')];
        }
        $models = self::find()->where(['visible' => self::VISIBLE, 'parent_id' => $root])->orderBy('sort')->all();
        foreach ($models as $model) {

            $items[] = [
                'label' => $model['title'],
                'url' => $model['link'],
                'active' => (($controllerId == $model['type']) && ($model['slug'] ? $slug == $model['slug'] : false)) || $_SERVER['REQUEST_URI'] == $model['link'],
                'items' => !$root ? self::getMenu(false, $model['id']) : [],
            ];
        }
        return $items;
    }

    /**
     * Возвращает тип меню
     * return array вида 'controllerName' => ['title' => '', 'values' => ['slug' => '', 'title => '']]
     */
    public static function getTypes()
    {
        $arr = [
            null => [
                'title' => 'Прямая ссылка',
                'values' => [],
            ],
            'page' => [
                'title' => 'Страницы',
                'values' => \app\models\Page::getSlugs()
            ],
        ];
        return $arr;
    }
    
}
