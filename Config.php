<?php

require_once "vendor/autoload.php";
require_once "HelperFunctions.php";

//site URL
define("SITE_URL", "http://". $_SERVER["HTTP_HOST"]."/sats/");

//hash value used to add layer of security to password
define("PASSWORD_SALT","ba59nk9tmsifawejf");

//declare the captcha keys
define("CAPTCHA_PRIVATE_KEY", "6LcNk-ESAAAAAOLlSXDwNi-XkdCMB1DceKuCOvmI");
define("CAPTCHA_PUBLIC_KEY", "6LcNk-ESAAAAAGozYD_WYYgfOL2MG8sr7OmHcQXc");

define("ROOT",realpath(dirname(__FILE__)));

define("HOST","localhost");
//user
define("USER_NAME","root");
//password
define("USER_PASSWORD","3UURV98K7rdWuZUW");
//data base name
define("DB_NAME","cubesat");

//image
define("IMAGE_DIRECTORY", ROOT . "/Upload/");
define("IMAGE_URL", SITE_URL .  "/Upload/");


date_default_timezone_set("UTC");

?>