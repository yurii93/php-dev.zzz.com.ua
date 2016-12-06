<?php

class CategoriesController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);

        $this->model = array(
            'category' => new Category(),
            'item' => new News(),
        );
    }

    public function page()
    {
        $this->data['categories'] = $this->model['category']->getList();

        $this->data['categoryId'] = $this->params[0];

        $paginationPage = str_replace('page-', '', $this->params[1]);

        $this->data['list'] = $this->model['item']->getDataForPagination($this->params[0], $paginationPage);

        $this->data['itemsAmount'] = $this->model['item']->getDataByCategory($this->params[0]);

        $itemsAmount = count($this->data['itemsAmount']);

        $this->data['pagination'] = new Pagination($itemsAmount, (int)$paginationPage, Config::get('news_category_pagination_amount'), 'page-');
    }

    public function admin_category() {

        if ($_POST) {

            $id = isset($_POST['title']) ? $_POST['title'] : null;

            $result = $this->model['category']->addCategory($_POST['title']);

            if ($result) {

                Session::setFlash('Категория добавлена');

            } else {

                Session::setFlash('Ошибка');
            }
        }

    }


}