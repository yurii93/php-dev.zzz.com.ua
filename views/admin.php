<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo Config::get('site_name'); ?></title>

    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <!---->
    <script src="/webroot/js/admin.js"></script>

    <style>
        body {
            background-color: #edeef0;
        }

        .navbar {
            background-color: black;
            border-radius: 2px;
            box-shadow: 0 0 4px rgba(0,0,0,0.5);
        }

        .navbar li a {
            color: #ffffff;
            font-weight: bold;
        }

        .navbar li a:hover {

            background-color: #5181b8;
        }

        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: #FFEFDB;
        }

        form {
            width: 500px;;
        }

        .dropdown-menu{
            background-color: #5181b8;
        }
		.active {
			background-color: #5181b8;
		}
    </style>

</head>
<body>

<div>

    <nav class="navbar navbar-static-top">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">На сайт</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if (Session::get('login')) { ?>

                    <ul class="nav navbar-nav">
                        <li style="margin-top: 10px;">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Комментарии
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li <?php if (App::getRouter()->getAction() == 'add') { ?>class="active" <?php } ?>><a href="/admin/comments/add/">Добавить </a></li>
                                <li <?php if (App::getRouter()->getAction() == 'edit') { ?>class="active" <?php } ?>><a href="/admin/comments/edit/">Редактировать</a></li>
                                <li <?php if (App::getRouter()->getAction() == 'politic') { ?>class="active" <?php } ?>><a href="/admin/comments/politic/">Политика</a></li>
                            </ul>
                        </li>
                        <li <?php if (App::getRouter()->getAction() == 'advert') { ?>class="active" <?php } ?>><a href="/admin/index/advert/">Реклама</a></li>
                        <li <?php if (App::getRouter()->getAction() == 'news') { ?>class="active" <?php } ?>><a href="/admin/item/news">Добавить новость</a></li>
                        <li <?php if (App::getRouter()->getAction() == 'category') { ?>class="active" <?php } ?>><a href="/admin/categories/category">Добавить категорию</a></li>
                        <li <?php if (App::getRouter()->getAction() == 'menu') { ?>class="active" <?php } ?>><a href="/admin/index/menu/">Добавить меню</a></li>
                        <li <?php if (App::getRouter()->getAction() == 'deletemenu') { ?>class="active" <?php } ?>><a href="/admin/index/deletemenu/">Удалить меню</a></li>
                        <li <?php if (App::getRouter()->getAction() == 'background') { ?>class="active" <?php } ?>><a href="/admin/index/background">Изменить цвет</a></li>
                    </ul>

                    <!---->
                    <div class="nav navbar-nav navbar-right dropdown">
                        <li><a href="/users/logout">Выйти</a></li>
                    </div>
                    <!---->


                <?php } ?>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <!--CONTENT-->
    <div class="row" align="center">

        <div class="col-md-12" align="center">
            <!--Session::flash()-->
            <?php if (Session::hasFlash()) { ?>
                <div class="alert alert-success role=" alert style="width: 300px">
                    <?php Session::flash(); ?>
                </div>
            <?php } ?>
            <!---->

            <!---->
            <?php echo $data['content']; ?>
            <!--это то, что находится в методе index() в PageController | это не тот массив, что в методе view-->
        </div>


    </div>
    <!--/CONTENT-->

</div>
<div class="row" style="margin-bottom: 20px;"></div>

</body>
</html>