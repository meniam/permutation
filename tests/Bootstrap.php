<?php

use Composer\Autoload\ClassLoader;
error_reporting(error_reporting() & ~E_USER_DEPRECATED);

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

define('LIBRARY_PATH',  dirname(__FILE__) . '/../src');
set_include_path(realpath(LIBRARY_PATH) . PATH_SEPARATOR . get_include_path());

require LIBRARY_PATH . '/Permutation/Exception.php';
require LIBRARY_PATH . '/Permutation/Permutation.php';

