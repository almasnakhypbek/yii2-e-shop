<?php

/**
 * Created by PhpStorm.
 * User: Kanat
 * Date: 20.07.2017
 * Time: 18:07
 */

namespace app\components;
use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget
{
    public $tpl;
    public $data;
    public $model;
    public $tree;
    public $menuHtml;


    public function init()
    {
        parent::init();

        if( $this->tpl === null )
        {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    /**
     * @return mixed|string
     */
    public function run()
    {
        // Get Cache
        if( $this->tpl == 'menu.php')
        {
            $menu = Yii::$app->cache->get('menu');
            if( $menu ) return $menu;
        }

        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        // Set Cache
        if( $this->tpl == 'menu.php')
        {
            Yii::$app->cache->set('menu', $this->menuHtml, 60);
        }



        return $this->menuHtml;
    }

    public function getTree()
    {
        $tree = [];
        foreach ($this->data as $id=>&$node)
        {
            if( !$node['parent_id'] )
            {
                $tree[$id] = &$node;
            } else
            {
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }

        }

        return $tree;

    }

    protected function getMenuHtml($tree, $tab='')
    {
        $str = '';
        foreach ($tree as $category)
        {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }


}