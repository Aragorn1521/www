<?php

Class Rouret
{
    private $routes;
    
    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include ($routesPath);
    }
    //Достаем из массива $_SERVER данные,которые ввел пользователь
    
    public function getURI() {
        if(!empty($_SERVER['REQUEST_URI'])) {
        return trim($_SERVER['REQUEST_URI'], '/');
        }
        
    }
    //присваиваем данные из метода getUri() переменной $uri
    public function run() 
    {
        
    $uri = $this->getURI();
    //Проверяем наличие такого запроса в routes.php
    foreach ($this->routes as $uriPattern => $path)
        {
        //Распарсили массив на юрл и метод
        if(preg_match("~$uriPattern~",$uri))
        {
            echo '<br> Где ищем - запрос,который набрал пользователь: '. $uri;
            echo '<br> Что ищем - Совпадение из правил: '. $uriPattern;
            echo '<br> Кто обрабатывает: '. $path;
            
          $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
          
            echo '<br> Что нужно сформировать: '. $internalRoute . '<br>';
          $segments = explode ('/', $path);
          $controllerName = array_shift($segments).'Controller';
          $controllerName = ucfirst($controllerName);
          
          $actionName = 'action'.ucfirst(array_shift($segments));
          
         //Подключение файла класса-контроллера
         
          $controllerFile = ROOT . '/controllers/'.
                  $controllerName . '.php';
          
          if (file_exists($controllerFile)){
              include_once ($controllerFile);
          }
          $controllerObject = new $controllerName;
          $result = $controllerObject->$actionName();
          if($result != null){              break;}
          
   }
    }


}
}