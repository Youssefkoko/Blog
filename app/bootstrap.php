<?php
// lOAD CONFIG 
require_once 'config/config.php';
// Load Helpers
require_once 'helper/url_helper.php';
require_once 'helper/seasion_helper.php';


// Auto LOad Core Libraries 
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
