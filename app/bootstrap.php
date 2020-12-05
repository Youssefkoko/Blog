<?php
// lOAD CONFIG 
require_once 'config/config.php';
// Load Helpers
// require_once 'helper/url_helper.php';
// require_once 'helper/seasion_helper.php';
foreach (glob(APPROOT . '\helper\*.php') as $file) {
  require_once $file;
}

// Auto LOad Core Libraries 
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
