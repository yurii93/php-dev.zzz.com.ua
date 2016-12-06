<?php

class IndexController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);

        $this->model = array(

            'category' => new Category(),
            'news' => new News(),
            'ads' => new Ads(),
            'comment' => new Comment(),
        );
    }

    public function index()
    {
        $this->data['categories'] = $this->model['category']->getList();

        // get id
        foreach ($this->model['category']->getId() as $id) {

            $this->data['id'][] = $id['id'][0];

        }

        $this->data['news'] = $this->model['news']->getLast($this->data['id']);

        $this->data['slider'] = $this->model['news']->getSliderData();

        $this->data['analytik'] = $this->model['news']->getAnalytikIndex();

        $this->data['tags'] = explode(',', News::getTags());

        $this->data['top_commentators'] = $this->model['comment']->topCommentators();

        $this->data['top_news'] = $this->model['news']->topNews();

        $ads = serialize($this->data['ads'] = $this->model['ads']->getAds());

        Session::set('ads', $ads);
    }

    public function admin_index()
    {

    }

    public function admin_advert()
    {
        if ($_POST) {

            $result = $this->model['ads']->addAds($_POST);

            if ($result) {
                Session::setFlash('Блок добавлен');
            } else {
                Session::setFlash('Ошибка');
            }
        }

    }

    public function admin_background()
    {

        $this->data['header'] = array(
            'crimson' => 'crimson', 'olive' => 'olive', 'blue' => 'blue', '#507299' => 'default');

        $this->data['background'] = array(
            'lightblue' => 'lightblue', 'gray' => 'gray', 'brown' => 'brown', '#edeef0' => 'default');

        if ($_POST) {

            Session::set('background', $_POST['background']);

            Session::set('header', $_POST['header']);

            $background = Session::get('background');

            $header = Session::get('header');

            if ($background || $header) {

                Session::setFlash('Цвет изменен');

            } else {

                Session::setFlash('Ошибка');

            }
        }

    }

    public function admin_menu()
    {
        if (isset($_POST) && $_POST) {

            Session::set('menuItems', serialize($_POST));

        }
    }

    public function admin_submenu()
    {
        $count = 1 + $_SESSION['submenu'];

        Session::set('submenu', $count);

        Router::redirect('/admin/index/menu/');


    }

    public function admin_deleteSubmenu()
    {
        if ($_SESSION['submenu'] > 0) {

            $count = $_SESSION['submenu'] - 1;

            Session::set('submenu', $count);
        }

        Router::redirect('/admin/index/menu/');
    }

    public function admin_deletemenu()
    {
        if ($_POST) {

            if (isset($_POST['title'])) {

                unset($_SESSION['menuItems']);

                return;
            }

            if ($_POST['subtitle']) {

                $session_array = unserialize($_SESSION['menuItems']);

                $key = array_search($_POST['subtitle'], $session_array['subtitle']);


                unset($session_array['subtitle'][$key]);
                $_SESSION['menuItems'] = serialize($session_array);

            }
        }
    }

}