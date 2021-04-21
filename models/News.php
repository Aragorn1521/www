<?php
Class News
{
    public static function getNewsItemById($id) 
            {
        
    }
    
    
    public static function getNewsList()
            {
        $host = 'localhost';
        $dbname = 'php_base';
        $user = 'root';
        $password = '';
        $db = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
        
        $newsList = [];
        
        $result = $db->query('SELECT id,title,date,short_content FROM news ORDER BY date DESC LIMIT 10');
      
        
        $i = 0;
        while ($row = $result->fetch()){
            $newsList[$i]['id'] = $row['$id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        
    }
    return $newsList;
}
}
