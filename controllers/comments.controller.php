<?php

class CommentsController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);

        $this->model = new Comment();
    }

    public function addComment()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'action') {

            if (isset($_POST['politic'])) {

                $politic = 0;
            } else {
                $politic = 1;
            }

            $comment = $_POST['comment'];

            $news_id = $_POST['news_id'];

            $user = Session::get('login');

            $date = date('y-m-d');

            $result = $this->model->putComment($comment, $news_id, $user, $date, $politic);

            if ($result['bool']) {

                $_SESSION["time_comment_id-{$result['comment_id']}"] = time();

                Router::redirect('/item/index/' . $news_id);

            } else {

                Session::setFlash('Ошибка');

            }

        }


        if (isset($_POST['parent']) && $_POST['parent']) {

            if (isset($_POST['politic'])) {

                $politic = 0;

            } else {

                $politic = 1;

            }

            $result = $this->data['subcomment'] = $this->model->addSubcomment($_POST, $politic);

            if ($result['bool']) {

                $_SESSION["time_comment_id-{$result['comment_id']}"] = time();

                Router::redirect('/item/index/' . $_POST['news_id']);

            } else {

                Session::setFlash('Error');

            }
        }

    }

    public function plusRate()
    {
        $this->model->addRate($this->params[0]);

        Router::redirect('/item/index/' . $this->params[1]);
    }

    public function minusRate()
    {
        $this->model->removeRate($this->params[0]);

        Router::redirect('/item/index/' . $this->params[1]);
    }

    public function edidcomment()
    {
        if ($_POST) {

            if ($this->model->updateComment($this->params[0], $_POST['comment'])) {

                Router::redirect("/item/index/{$this->params[1]}");

            }
        }

        if (isset($_SESSION["time_comment_id-{$this->params[0]}"])

            && (time() < ($_SESSION["time_comment_id-{$this->params[0]}"] + 60))) {

            $this->data['comment'] = $this->model->getCommentById($this->params[0]);

        } else {

            Router::redirect("/item/index/{$this->params[1]}");

        }
    }

    public function all()
    {

        $paginationPage = str_replace('page-', '', $this->params[1]);

        $itemsAmount = $this->model->topCommentators();

        foreach ($itemsAmount as $amount) {

            if ($amount['user'] == $this->params[0]) {

                $itemsAmount = $amount['quantity'];

            }
        }

        $this->data['comments'] = $this->model->getUsersComments($this->params[0], $paginationPage);

        $this->data['pagination'] = new Pagination((int)$itemsAmount, (int)$paginationPage, Config::get('news_category_pagination_amount'), 'page-');
    }

    public function admin_add()
    {
        $this->data['news'] = $this->model->getNewsList();

        if ($_POST) {

            $result = $this->model->putComment($_POST['content'], $_POST['news_id'], $_SESSION['login'], date('y-m-d'));

            if ($result['bool']) {

                Session::setFlash('Комментарий добавлен');

            } else {

                Session::setFlash('Ошибка');

            }
        }
    }

    public function admin_edit()
    {
        $this->data['comments'] = $this->model->selectForAdminEdit();

        if ($_POST) {

            $result = $this->model->updateComment($_POST['comment_id'], $_POST['content']);

            if ($result) {

                Session::setFlash('Комментарий отредактирован');

            } else {

                Session::setFlash('Ошибка');

            }
        }
    }

    public function admin_politic()
    {
        $this->data['comments'] = $this->model->selectForPolitic();

        if ($_POST) {

            $result = $this->model->updatePolitic($_POST['comment_id']);

            if ($result) {

                Session::setFlash('Комментарий стал видимым');

            } else {

                Session::setFlash('Ошибка');

            }
        }
    }

}