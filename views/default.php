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
    <script src="https://cdn.jsdelivr.net/autoComplete/1.5.2/jqm.autoComplete.min.js"></script>
    <link href="/webroot/css/jquery.autocomplete.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/webroot/js/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="/webroot/js/jquery.autocomplete.pack.js"></script>
    <style>
        body {
            background-color: <?php if(Session::get('background')) { echo Session::get('background');} else {echo '#edeef0';} ?>;
        }

        h3,h2,h4,h1 {
            color: black;
        }
        a{
            color: #EEEE00;
        }

        a:hover {
            color: black;
        }
		
        .navbar {
            background-color: <?php if(Session::get('header')) { echo Session::get('header');} else {echo '#507299';} ?>;
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

        #auto-search {
            width: 170px;
            text-align: center;
            margin-top: 3px;
            border-radius: 14px;
            height: 28px;
            background-color: #305075;
            border: none;
            color: #ffffff;
            font-weight: bold;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-menu {
            background-color: #507299
        }

        .dropdown-submenu > .dropdown-menu {
            background-color: #507299;
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }

        .dropdown-submenu > a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #cccccc;
            margin-top: 5px;
            margin-right: -10px;
            background-color: #507299;
        }

        .dropdown-submenu:hover > a:after {
            border-left-color: #ffffff;
        }

        .our-search {
            margin-top: 5px;
        }

        .dropdown-submenu:hover > a:after {
            background-color: #eeeeee;
        }

        .advert .block {
            border-radius: 2px;
            background-color: #507299;
            text-align: center;
            border: 1px solid gray;
            margin-bottom: 7px;
            color: #FFD700;
            font-weight: bold;
            box-shadow: 0 0 2px rgba(0,0,0,0.5);
        }
        .block .price{
            color: yellow;
        }
        .block .discount {
            color: black;
        }

        .block .discount span {
            color: #FFD700;
        }

        .cont {
            border-radius: 2px;
            background-color: #507299;
            color: white;
            border: 1px solid gray;
            font-weight: bold;
            box-shadow: 0 0 2px rgba(0,0,0,0.5);
        }

        #carousel-example-generic {
            border: 2px solid gray;
            margin-top: 20px;;
            width: 504px;
            height: 304px;
        }
        .carousel-inner {
            width: 500px;
            height: 300px;
        }
        .carousel-inner .carousel-caption{
            color: yellow;
        }

        .form-group {
            width: 300px;
            color: chocolate;
        }

        .item-tags {
            color: darkgrey;
        }

        .visitor {
            color: #FFD700;
        }
		
		.active {
			background-color: #507299;
		}
    </style>
</head>
<body>
<div id="message"
     style="text-align: center; background-color: #305075; display: none; width: 350px; z-index: 1000; position: fixed; left: 50%; margin-top: 100px; margin-left: -175px;"
     class="alert alert-dismissible" role="alert">
    <button type="button" class="close close-message" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <form class="navbar-form navbar-left" method="post">
        <h3 style="color: #6a9602; margin-top: -5px;">Подписаться на рассылку!</h3>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Имя" name="name">
            <br>
            <br>
            <input type="email" class="form-control" placeholder="Почта" name="email">
            <br>
            <br>
        </div>
        <button type="submit" class="btn btn-success close-message">Подписаться</button>
    </form>
</div>
<nav class="navbar navbar navbar-fixed-top">
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
            <a class="navbar-brand" href="/"><?php echo Config::get('site_name'); ?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Главная</a></li>
                <li class="menu-item dropdown test">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Дополнительно<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if(Session::get('login')) : ?>
                         <li><a href="/users/logout/">Выйти</a></li>
                        <?php else: ?>
                        <li <?php if (App::getRouter()->getAction() == 'login') { ?>class="active" <?php } ?>><a href="/users/login/">Войти</a></li>
                        <li <?php if (App::getRouter()->getAction() == 'register') { ?>class="active" <?php } ?>><a href="/users/register/">Регистрация</a></li>
                        <?php endif; ?>
                        <li class="menu-item dropdown dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Партнеры</a>
                            <ul class="dropdown-menu">

                                <li><a href="https://www.google.com/">Google</a></li>
                                <li><a href="https://www.yandex.com/">Yandex</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php if (isset($_SESSION['menuItems']) && $_SESSION['menuItems']) {
                    $menuItems = unserialize($_SESSION['menuItems']);
                }
                if (!isset($menuItems['subtitle']) || !$menuItems['subtitle']) { ?>
                    <li><a href="#"><?php if (isset($menuItems)) {
                                echo $menuItems['title'];
                            } ?></a></li>
                <?php } else { ?>
                    <li class="menu-item dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $menuItems['title'] ?><b
                                class="caret"></b></a>
                        <ul class="dropdown-menu from-admin">
                            <?php foreach ($menuItems['subtitle'] as $items) : ?>
                                <li><a href="#"><?php echo $items ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <form class="navbar-form navbar-left" action="/item/search/" method="post">
                <div class="form-group">
                    <input id="auto-search" autocomplete="off" type="text" class="form-control"
                           placeholder="Поиск по тегам" name="tag">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if (Session::get('login') &&  Session::get('role') == 'admin'):?>
                    <li><a href="/admin/">Админ панель</a></li>
                <?php elseif (Session::get('login') &&  Session::get('role') != 'admin') :?>
                    <li><a href="/cabinet/">Кабинет</a></li>
                <?php endif ?>

                <?php if (!Session::get('login')) :?>
                    <li><a href="/users/login/">Войти</a></li>
                <?php else: ?>
                    <li <?php if (App::getRouter()->getController() == 'users') { ?>class="active" <?php } ?>><a
                            href="/users/logout/">Выйти</a></li>
                <?php endif; ?>
                </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div style="margin-top: 100px;">
    <div class="col-md-2 advert">
        <h3 align="center">Реклама</h3>
		<?php if (unserialize($_SESSION['ads'])) : ?>
        <?php
        $counter = 0;
        foreach (unserialize($_SESSION['ads']) as $ad)  :?>
            <?php if ($counter > 3) break ?>
            <?php if ($ad['number'] == 1) : ?>
                <div class="block">
                    <p class="offer"><?php echo $ad['title'] ?></p>
                    <p class="vendor"><?php echo $ad['vendor'] ?></p>
                    <p class="price"><span><?php echo $ad['price'] ?></span> грн.</p>
                    <p class="discount" style="display: none">Ваш купон: <span><b></b></span> - примените и получите
                        скидку 10%</p>
                </div>
                <?php $counter++; endif; ?>
        <?php endforeach; ?>
		<?php else: ?>
		<b>Нет предложений</b>
		<?php endif; ?>
    </div>
    <div class="col-md-8 cont" align="center"
         style="border: 1px solid rgba(0,0,0,0.1);">
        <!--Session::flash()-->
        <?php if (Session::hasFlash()) { ?>
            <div class="alert alert-info role=" alert>
                <?php Session::flash(); ?>
            </div>
        <?php } ?>
        <?php echo $data['content']; ?>
    </div>
    <div class="col-md-2 advert">
        <h3 align="center">Реклама</h3>
        <?php if (unserialize($_SESSION['ads'])) : ?>
        <?php
        $counter = 0;
        foreach (unserialize($_SESSION['ads']) as $ad)  :?>
            <?php if ($counter > 3) break ?>
            <?php if ($ad['number'] == 2) : ?>
                <div class="block">
                    <p class="offer"><?php echo $ad['title'] ?></p>
                    <p class="vendor"><?php echo $ad['vendor'] ?></p>
                    <p class="price"><span><?php echo $ad['price'] ?></span> грн.</p>
                    <p class="discount" style="display: none">Ваш купон: <span><b></b></span> - примените и получите
                        скидку 10%</p>
                </div>
                <?php $counter++; endif; ?>
        <?php endforeach; ?>
		<?php else: ?>
		<b class="pull-right">Нет предложений</b>
		<?php endif; ?>
    </div>
</div>
<div class="row" style="margin-bottom: 20px;"></div>
<script>

    //advertising

    //price
    $('.block').mouseenter(function () {
        $(this).find('.price').css({'fontSize': 18, 'color': 'red'});
        $(this).find('.price span').html(($(this).find('.price span').html() * 0.9).toFixed(2));
    });
    $('.block').mouseleave(function () {
        $(this).find('.price').css({'fontSize': 14, 'color': 'yellow'});
        $(this).find('.price span').html(Math.ceil($(this).find('.price span').html() * 1.11111111111111111111111111));
    });


    /*----------------------------------------------------------*/

    function randWD(n) {  // [ 2 ] random words and digits
        return Math.random().toString(36).slice(2, 2 + Math.max(1, Math.min(n, 20)));
    }

    /*----------------------------------------------------------*/

    // for advert
    $('.block').mouseenter(function () {
        $(this).find('.discount span b').html(randWD(20));
        $(this).find('.discount').css('display', 'block');
    });
    $('.block').mouseleave(function () {
        $(this).find('.discount').css('display', 'none');
    });
    /*----------------------------------------------------------*/

    // get cookie
    function get_cookie(cookie_name) {
        var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');
        if (results)
            return ( unescape(results[2]) );
        else
            return null;
    }

    // for visitors random
    var news = $('#news').attr("news");

    if (news) {

        var all_visitors = Number(get_cookie("visitors_all_" + news));
        $('#visitors_all').html(all_visitors);
        //var all_visitors = 0;

        setInterval(function () {
            $.post("/webroot/visitors.random.php", {}, function (data) {
                $('#visitors').html(data);
            });

            document.cookie = "visitors_" + news + "=" + Number($('#visitors').html());
            all_visitors = all_visitors + Number(get_cookie("visitors_" + news));
            $('#visitors_all').html(all_visitors);
            document.cookie = "visitors_all_" + news + "=" + all_visitors;

        }, 3000);
    }
    /*----------------------------------------------------------*/

    // auto
    $(function () {

        $('#auto-search').autocomplete([<?php echo News::getTags(); ?>], {
            width: 200,
            max: 3
        });
    });
    /*----------------------------------------------------------*/

    //close
    window.onbeforeunload = function () {
        return true;
    };

    $(function () {
        $("a").click(function () {
            window.onbeforeunload = null;
        });
    });

    $(function () {
        $("button").click(function () {
            window.onbeforeunload = null;
        });
    });

    $(function () {
        $("input").click(function () {
            window.onbeforeunload = null;
        });
    });

    /*----------------------------------------------------------*/

    // message
    if (!get_cookie("message")) {

        $(document).ready(function () {
            setTimeout("$('#message').show('slideDown');", 7000);
            $(".close-message").click(function () {
            });
            document.cookie = "message=ok";
        });
    }

    /*----------------------------------------------------------*/
    // subcomment
    $('.open_subcomment').click(function () {
        $(this).find('.subcomment').show();
    });

    // for pagination
    $('#special-pagination').click(function () {
        $('#hidden-pagination').slideToggle();
    });


</script>

</body>
</html>