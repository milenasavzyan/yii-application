<?php

namespace app\components;

use common\models\Category;
use yii\base\Widget;
class MenuWidget extends Widget
{

    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menuHtml;
    public $model;
    public $cache_time = 60;
    public function init()
    {
        parent::init();
        if ($this->ul_class === null) {
            $this->ul_class = 'menu';
        }
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }
    public function run()
    {
        if ($this->cache_time) {
            $menu = \Yii::$app->cache->get('menu');
            if ($menu) {
                return $menu;
            }
        }


        $this->data = Category::find()->select('id, parent_id, title')->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        return $this->menuHtml;


        if ($this->cache_time) {
            \Yii::$app->cache->set('menu', $this->menuHtml, $this->cache_time);
        }
        return $this->menuHtml;


    }
    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => $node) {
            if ($node['parent_id'] == 0) {
                $tree[$id] = $node;
            } else {
                $tree[$node['parent_id']]['children'][$id] = $node;
            }
        }
        return $tree;
    }
//    protected function getMenuHtml($tree)
//    {
//        $str = '';
//        foreach ($tree as $category) {
//            $str .= $this->catToTemplate($category);
//        }
//        return $str;
//    }
    public function getMenuHtml($categories) {
        // Initialize the HTML string
        $html = '<div class="dropdown-menu bg-secondary border-0 rounded-0 w-100 m-0">';

        // Iterate over the categories
        foreach ($categories as $category) {
            // Generate the URL for the category
            $url = \yii\helpers\Url::to(['category/view', 'id' => $category['id']]);

            // Add the category link to the HTML
            $html .= '<a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" class="dropdown-item">';
            $html .= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8');
            $html .= '</a>';

            // Check for and recursively add child categories
            if (isset($category['children']) && is_array($category['children'])) {
                $html .= $this->getMenuHtml($category['children']);
            }
        }

        $html .= '</div>';

        // Return the HTML string
        return $html;
    }


    protected function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}