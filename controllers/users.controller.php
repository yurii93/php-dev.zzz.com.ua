<?php

class UsersController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = array(
			'user' => new User(),
			'ads' => new Ads()
		);
    }

    public function login()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])) {

            $user = $this->model['user']->getByLogin($_POST['login']);

            if ($user && $_POST['password'] == $user['password']) {

                Session::set('login', $user['login']);

                Session::set('role', $user['role']);

                if($_SESSION['role'] == 'admin') {

                    Router::redirect('/admin/');

                }

                Router::redirect('/cabinet/');
            }
        }
		
		$ads = serialize($this->data['ads'] = $this->model['ads']->getAds());

        Session::set('ads', $ads);
    }

    public function logout()
    {
        Session::delete('login');

        Session::delete('role');

        Router::redirect('/');
    }

    public function register() {

        if($_POST) {

            if(isset($_POST['password'], $_POST['login'])) {

                if($this->model['user']->register($_POST)) {

                    header('Location: /users/login/');

                } else {

                    Session::setFlash('Ошибка');

                }
            }

        }
    }

    public function admin_login() {

        if(Session::get('role') != 'admin') {

            Router::redirect('/users/login');

        }
    }
}