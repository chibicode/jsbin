<?php
// Pull in the local settings. Fallback to the defaults.
$locals = array();
$package  = json_decode(file_get_contents('../package.json'), true);
$defaults = json_decode(file_get_contents('../config.default.json'), true);
if (file_exists('../config.local.json')) {
  $locals = json_decode(file_get_contents('../config.local.json'), true);
}

$settings = array_merge($defaults, $locals);

// database settings
define('DB_NAME',     $settings['db.name']);
define('DB_USER',     $settings['db.user']); // Your MySQL username
define('DB_PASSWORD', $settings['db.pass']); // ...and password
define('DB_HOST',     $settings['db.host']); // 99% chance you won't need to change this value

// change this to suite your offline detection
define('OFFLINE', $settings['offline']);

define('HOST', $settings['host']);

// Path prefix for all jsbin urls.
define('PATH', $settings['path']);

// The full url to the root page of the app.
define('ROOT', $settings['protocol'] . '://' . HOST . PATH);

// wishing PHP were more like JavaScript...wishing I was able to use Node.js they way I had wanted...
define('VERSION', OFFLINE ? 'debug' : $package['version']);
?>
