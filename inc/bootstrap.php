<?php

define("PROJECT_ROOT_PATH",dirname(__DIR__, 1));

// include main configuration file
require_once PROJECT_ROOT_PATH . "/inc/config.php";
// include the base controller file
require_once PROJECT_ROOT_PATH . "/Controller/BaseController.php";
// include the use model file
require_once PROJECT_ROOT_PATH . "/Model/UserModel.php";
require_once PROJECT_ROOT_PATH . "/Model/CircolariModel.php";
require_once PROJECT_ROOT_PATH . "/Model/NotizieModel.php";

?>