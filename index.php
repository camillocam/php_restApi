<?php

// elemento 4 e 5 dell'array dipende dal path del sito.
    require __DIR__ . "/inc/bootstrap.php";
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri);
   
    if ((isset($uri[4]) && $uri[4] == 'user')) {
        require PROJECT_ROOT_PATH . "/Controller/UserController.php";
        $objFeedController = new UserController();
        $strMethodName = $uri[5] . 'Action';
        $objFeedController->{$strMethodName}();
    }
    
    if ((isset($uri[4]) && $uri[4]== 'circolari') ) { 

        require PROJECT_ROOT_PATH . "/Controller/CircolariController.php";
        $objFeedController = new CircolariController();
        $strMethodName = $uri[5] . 'Action';
        $objFeedController->{$strMethodName}();
    }
    
    if ((isset($uri[4]) && $uri[4]== 'notizie') ) { 
        
        require PROJECT_ROOT_PATH . "/Controller/NotizieController.php";
        $objFeedController = new NotizieController();
        $strMethodName = $uri[5] . 'Action';
        $objFeedController->{$strMethodName}();
    }
    
        header("HTTP/1.1 404 Not Found");
        exit();
    

   
?>