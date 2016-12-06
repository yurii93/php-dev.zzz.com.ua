<?php

class Model
{
    protected $db;

    protected static $staticDb;

    protected $table;

    public function __construct()
    {
        $this->db = App::$db;

        self::$staticDb = App::$db;
    }
}