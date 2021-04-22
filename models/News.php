<?php
Class News
{
    public static function getNewsItemById($id) 
            {
        $id = intval($id);
        if($id)
        { 
         $db = Db::getConnection();
         $result = $db->query('SELECT * FROM news WHERE id ='. $id);
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $newsItem = $result->fetch();
         return $newsItem;
            
        }
        
    }
    
    
    public static function getNewsList()
            {
       $db = Db::getConnection();
        
        $newsList = [];
        
        $result = $db->query('SELECT id,title,date,author_name,short_content FROM news ORDER BY id ASC LIMIT 10');
      
//        $result1 = $result->fetchAll();
//        echo '<pre>';
//        print_r($result1);
//        echo '<pre>';
        $i = 0;
        while ($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        
    }
    return $newsList;
}
}
