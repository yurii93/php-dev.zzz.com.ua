<?php

class ItemController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = array(
            'news' => new News(),
            'category' => new Category(),
            'comment' => new Comment()
        );
    }

    public function index()
    {
        $result = $this->model['news']->getNewsById($this->params[0]);

        $this->data['comments'] = $this->model['comment']->getComment($this->params[0]);

        if($result[0]['is_analytik'] == 1) {

            if(Session::get('login')) {

                $this->data['item'] = $result;
            } else {

                $result[0]['content'] = implode('. ', array_slice(explode('.', $result[0]['content']), 0, 5)) . '.';

                $this->data['item'] = $result;
            }
        }

        $search_politic = false;

        foreach ($this->data['comments'] as $comment) {

            if(!$comment['not_politic']) {

                $search_politic = true;
            }
        }

        $this->data['is_politic'] = $search_politic;

        $this->data['item'] = $result;

        $this->data['visitors_now'] = rand(1,5);

        $this->data['tags'] = explode(',',$this->data['item'][0]['tags']);
    }

    public function tags() {

        $this->data['tag'] = $this->params[0];

        $paginationPage = str_replace('page-', '', $this->params[1]);

        $this->data['list'] = $this->model['news']->getNewsByTag($this->data['tag'], $paginationPage);

        $itemsAmount = count($this->model['news']->getDataByTag($this->data['tag']));

        $this->data['pagination'] = new Pagination($itemsAmount, (int)$paginationPage, Config::get('news_category_pagination_amount'), 'page-');
    }

    public function search() {

        $post = isset($_POST['tag']) ? $_POST['tag'] : null;

        if($post) {

            Router::redirect("/item/tags/$post/page-1");

        }
    }

    public function analytik() {

        $paginationPage = str_replace('page-', '', $this->params[0]);

        $this->data['analytik'] = $this->model['news']->getAnalytik($paginationPage);

        $itemsAmount = count($this->model['news']->getAnalytikCount());

        $this->data['pagination'] = new Pagination($itemsAmount, (int)$paginationPage, Config::get('news_category_pagination_amount'), 'page-');
    }

    public function filter() {

        if($_POST) {

            $this->data['item'] = $this->model['news']->getByFilter($_POST);

        }

    }

    public function admin_news() {

        $this->data['category_list'] = $this->model['category']->getList();

        if ($_POST) {

            $result = $this->model['news']->addNews($_POST);

            if ($result) {

                Session::setFlash('Новость была добавлена');

            } else {

                Session::setFlash('Ошибка');
            }
        }

    }

}