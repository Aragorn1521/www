<?php
include_once (ROOT. '/models/News.php');

Class NewsController
{
    public function actionIndex() {
       
        $newsList = [];
        $newsList = News::getNewsList();
        
        require_once ROOT.'/views/news/index.php';
        return true;
    }
    
    public function actionView($id) {
      
        if($id) {
            $newsItem = News::getNewsItemById($id);
            echo '<pre>';
            print_r($newsItem);
             echo '<pre>';
             return true;
        }
       
        
    }
}
