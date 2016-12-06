<?php

Config::set('site_name', 'Top News');

Config::set('routes', array(

    'default' => '',

    'admin' => 'admin_',

));

Config::set('default_route', 'default');

Config::set('default_controller', 'index');

Config::set('default_action', 'index');



Config::set('db.host', 'mysql.zzz.com.ua');

Config::set('db.user', 'php1000');

Config::set('db.password', 'php1000');

Config::set('db.db_name', 'php_dev');

Config::set('news_category_pagination_amount', 5);