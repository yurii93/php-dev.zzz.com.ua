<?php

class Ads extends Model {

    protected $table = 'ads';

    public function getAds() {

        $sql = "SELECT * FROM {$this->table} ORDER BY rand()";

        return $this->db->query($sql);
    }

    public function addAds($array) {

        $sql = "INSERT INTO {$this->table} (`title`, `vendor`, `price`, `number`)" .
            "VALUES ('{$array['title']}', '{$array['vendor']}', '{$array['price']}', '{$array['number']}')";

        return $this->db->query($sql);
    }
}