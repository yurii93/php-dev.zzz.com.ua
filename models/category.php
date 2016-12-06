<?php

class Category extends Model
{

    protected $table = 'categories';

    public function getList()
    {
        $sql = "SELECT * FROM {$this->table} WHERE 1";

        return $this->db->query($sql);
    }

    public function getId()
    {
        $sql = "SELECT id FROM {$this->table} WHERE 1";

        return $this->db->query($sql);
    }

    public function addCategory($title)
    {
        $sql = "INSERT INTO $this->table SET `title` = '{$title}'";

        return $this->db->query($sql);
    }
}