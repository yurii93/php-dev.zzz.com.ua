<?php

class News extends Model
{
    protected $table = 'news';

    public function getLast($data)
    {
        $sql = '';

        foreach ($data as $id) {

            $sql .= "(SELECT * FROM {$this->table} WHERE category_id = {$id} ORDER BY `date` DESC LIMIT 5) ";

            if (next($data)) {

                $sql .= " UNION ";

            }
        }

        return $this->db->query($sql);
    }

    public function getSliderData()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY `date` DESC LIMIT 4";

        return $this->db->query($sql);
    }

    public function getDataByCategory($category)
    {
        $sql = "SELECT * FROM {$this->table} WHERE category_id = {$category}";

        return $this->db->query($sql);
    }


    public function getDataForPagination($category = false, $page = 1)
    {
        if ($category) {

            $page = intval($page);

            $offset = ($page - 1) * Config::get('news_category_pagination_amount');

            $limit = Config::get('news_category_pagination_amount');

            $sql = "SELECT * FROM {$this->table} WHERE category_id = {$category} ORDER BY `date` DESC LIMIT {$limit} OFFSET {$offset}";

            return $this->db->query($sql);

        }
    }

    public function getNewsById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";

        return $this->db->query($sql);
    }

    public function getNewsByTag($tag, $page = 1)
    {
        $page = intval($page);

        $offset = ($page - 1) * Config::get('news_category_pagination_amount');

        $limit = Config::get('news_category_pagination_amount');

        $sql = "SELECT * FROM {$this->table} WHERE tags LIKE '%{$tag}%' ORDER BY `date` DESC LIMIT {$limit} OFFSET {$offset}";

        return $this->db->query($sql);

    }

    public function getDataByTag($tag)
    {
        $sql = "SELECT * FROM {$this->table} WHERE tags LIKE '%{$tag}%'";

        return $this->db->query($sql);
    }

    public function getAnalytik($page)
    {
        $page = intval($page);

        $offset = ($page - 1) * Config::get('news_category_pagination_amount');

        $limit = Config::get('news_category_pagination_amount');

        $sql = "SELECT * FROM {$this->table} WHERE `is_analytik` = 1 LIMIT {$limit} OFFSET {$offset}";

        return $this->db->query($sql);
    }

    public function getAnalytikIndex()
    {
        $sql = "SELECT * FROM {$this->table} WHERE `is_analytik` = 1 LIMIT 5";

        return $this->db->query($sql);
    }

    public function getAnalytikCount()
    {
        $sql = "SELECT * FROM {$this->table} WHERE `is_analytik` = 1";

        return $this->db->query($sql);
    }

    public static function getTags()
    {
        $sql = "SELECT tags FROM news";

        $tags = self::$staticDb->query($sql);

        $string = '';

        foreach ($tags as $tag) {

            if ($tag['tags']) {

                $string .= $tag['tags'] . ',';

            }
        }

        $string = trim($string, ',');

        $array_tags = explode(',', $string);


        foreach ($array_tags as &$tag) {

            $tag = '\'' . $tag . '\'';

        }

        $array_tags = array_unique($array_tags);

        $string = implode(',', $array_tags);

        return $string;
    }

    public function getByFilter($array)
    {

        foreach ($array['category'] as &$category) {

            $category = "'" . $category . "'";
        }

        $categories = implode(',', $array['category']);

        $tags = implode(',', $array['tags']);

        $sql = "SELECT * FROM {$this->table} WHERE (`date` BETWEEN '{$array['dateFrom']}' AND '{$array['dateTo']}') 
                AND (tags IN ({$tags})) AND (category_title IN ({$categories}))";


        return $this->db->query($sql);

    }

    public function addNews($array)
    {
		
		if(isset($array['analytik'])) {

			$array['analytik'] = 1;

		} else {

			$array['analytik'] = 0;

		}
		
        $array['category'] = explode(',', $array['category']);

        $category_title = $array['category'][0];

        $category_id = $array['category'][1];

        $date = date('y-m-d');

            $sql = "INSERT INTO {$this->table} 
        (`title`, `category_title`, `content`, `category_id`, `image`, `tags`, `is_analytik`, `date`) 
        VALUES ('{$array['title']}', '{$category_title}', '{$array['content']}', '{$category_id}', 
        '{$array['image']}', '{$array['tags']}', '{$array['analytik']}', '{$date}')";


        return $this->db->query($sql);
    }

    public function topNews()
    {
        $date = date('y-m-d');

        $sql="SELECT title, id, count(*) as quantity FROM (select news.id, news.title FROM news 
              RIGHT JOIN comment on news.id = comment.news_id WHERE comment.date = '{$date}') as `view` 
              GROUP BY id ORDER BY quantity DESC LIMIT 3";

        return $this->db->query($sql);
    }

}