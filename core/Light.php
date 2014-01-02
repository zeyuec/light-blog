<?php
  /**
   * Light Framework - config file
   * @author zeyuec
   * @since 2013-01-27
   */

// 0. dir
define('CONTROLLER_DIR', __DIR__.'/../controller/');
define('MODEL_DIR', __DIR__.'/../model/');
define('ERROR_404_FILE', __DIR__.'/../404.php');

define('PHP_MARKDOWN_DIR', __DIR__.'/../lib/phpmarkdown-1.0.1p/');
define('SMARTY_DIR', __DIR__.'/../lib/Smarty-3.1.13/libs/');
define('SMARTY_TEMPLATE', __DIR__.'/../template/');
define('SMARTY_RUNTIME_DIR', __DIR__.'/../runtime/smarty/');


// 1. config
class Light
{
    // website
    const WEB_ROOT = 'http://obcerver.com';
    
    // default
    const DEFAULT_CONTROLLER = 'post';
    const DEFAULT_ACTION = 'list';
    const DEFAULT_POSTS_PER_PAGE = 5;

    // debug level: use this flag to determine log status
    const DIST_LEVEl = 'prod';

    // db
    const DB_HOST = 'localhost';
    const DB_PORT = '3306';
    const DB_NAME = '!YOUR_DB_NAME';
    const DB_USER = '!YOUR_DB_USER';
    const DB_PASS = '!YOUR_DB_PASS';

    // import model used in your Controller, ex: Light::importModel('test')
    public static function importModel($modelName) {
        $className = ucfirst($modelName).'Model';
        require_once(MODEL_DIR.$className.'.php');
    }
}
?>
