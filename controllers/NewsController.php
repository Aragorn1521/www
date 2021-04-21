<?php

Class NewsController
{
    public function actionIndex() {
       
        echo 'Просмотр всех новостей';
         return true;
    }
    
    public function actionView() {
      
        echo 'Просмотр 1 новости';
        return true;
    }
}
