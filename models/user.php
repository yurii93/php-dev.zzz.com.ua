<?php

class User extends Model
{
    public function getByLogin($login)
    {
        $login = $this->db->escape($login);

        $sql = "SELECT * FROM users WHERE login = '{$login}' LIMIT 1";

        $result = $this->db->query($sql);

        if (isset($result[0])) {

            return $result[0];

        }

        return false;
    }

    public function register($array)
    {
        $login = $this->db->escape($array['login']);

        $password = $this->db->escape($array['password']);

        $sql = "INSERT INTO users (`login`, `password`) VALUES ('{$login}', '{$password}')";

        $result = $this->db->query($sql);

        return $result;
    }
}