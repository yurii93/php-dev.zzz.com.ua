<?php

class Comment extends Model
{

    protected $table = 'comment';

    public function putComment($comment,$news_id,$user,$date, $not_politic)
    {
        $comment = $this->db->escape($comment);

        $comment = htmlspecialchars($comment);

        $sql = "INSERT INTO {$this->table} (`user`, `news_id`, `date`, `content`, `not_politic`) VALUES ('$user','$news_id','$date','$comment', '$not_politic')";

        $result = $this->db->query($sql);

        $sql = "SELECT `id` FROM {$this->table} ORDER BY `id` DESC LIMIT 1";

        $comment_id = $this->db->query($sql);

        return array('bool' => $result, 'comment_id' => $comment_id[0]['id']);
    }

    public function getComment($id)
    {
        $sql = "SELECT * FROM $this->table WHERE news_id = '{$id}' ORDER BY `rate` DESC";

        return $this->db->query($sql);
    }

    public function addRate($id)
    {
        $sql = "SELECT `rate` FROM {$this->table} WHERE `id` = {$id}";

        $rate = $this->db->query($sql);
        $rate = intval($rate[0]['rate']) + 1;


        $sql = "UPDATE $this->table SET `rate` = $rate WHERE `id` = $id";

        return $this->db->query($sql);
    }

    public function removeRate($id)
    {
        $sql = "SELECT `rate` FROM {$this->table} WHERE `id` = {$id}";

        $rate = $this->db->query($sql);

        $rate = intval($rate[0]['rate']) - 1;

        $sql = "UPDATE {$this->table} SET `rate` = '{$rate}' WHERE `id`= {$id}";

        return $this->db->query($sql);
    }


    public function getCommentById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE `id` = {$id} LIMIT 1";

        return $this->db->query($sql);
    }

    public function updateComment($id, $content)
    {
        $content = $this->db->escape($content);

        $content = htmlspecialchars($content);

        $sql = "UPDATE {$this->table} SET `content` = '{$content}' WHERE `id` = {$id}";

        return $this->db->query($sql);
    }

    public function topCommentators()
    {

        $sql = "SELECT `user`, count(*) AS `quantity` FROM {$this->table} GROUP BY `user` ORDER BY `quantity` DESC LIMIT 5";

        return $this->db->query($sql);
    }

    public function getUsersComments($user = false, $page = 1)
    {
        $page = intval($page);

        $offset = ($page - 1) * Config::get('news_category_pagination_amount');

        $limit = Config::get('news_category_pagination_amount');

        $sql = "SELECT `user`, `content` FROM {$this->table} WHERE `user` = '{$user}' LIMIT {$limit} OFFSET {$offset}";

        return $this->db->query($sql);
    }

    public function addSubcomment($array, $not_politic)
    {
        $comment = $this->db->escape($array['content']);

        $comment = htmlspecialchars($comment);

        $user = Session::get('login');

        $date = date('y-m-d');


        $sql = "INSERT INTO `{$this->table}` (`content`, `news_id`, `user`, `parent_comment`, `date`, `not_politic`) 
                VALUES ('{$comment}', '{$array['news_id']}', '{$user}' ,'{$array['parent']}', '{$date}', '{$not_politic}')";

        $result = $this->db->query($sql);

        $sql = "SELECT `id` FROM {$this->table} ORDER BY `id` DESC LIMIT 1";

        $comment_id = $this->db->query($sql);

        return array('bool' => $result, 'comment_id' => $comment_id[0]['id']);
    }


    public function getNewsList()
    {
        $sql=" SELECT * FROM `news`";

        return $this->db->query($sql);

    }

    public function selectForAdminEdit()
    {
        $sql = "SELECT news.title AS news_title, `comment`.content, `comment`.user, `comment`.id FROM `news` RIGHT JOIN comment on news.id = comment.news_id";

        return $this->db->query($sql);
    }

    public function selectForPolitic()
    {
        $sql = "SELECT content, id FROM `{$this->table}` WHERE `not_politic` = 0";

        return $this->db->query($sql);

    }

    public function updatePolitic($id)
    {
        $sql = "UPDATE `{$this->table}` SET `not_politic` = 1 WHERE `id` = '{$id}'";
        
        return $this->db->query($sql);
    }


}