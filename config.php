<?php

// Database Settings
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'fleet');
define('DB_PORT', 3306);
define('DB_CHARSET', 'utf8');



// Session Names
define('SESSION_PREFIX', 'swp_');
define('LOGIN_ADMIN', SESSION_PREFIX . 'admin_login');
define('LOGIN_USER', SESSION_PREFIX . 'user_login');
define('LOGIN_TOKEN_ADMIN', SESSION_PREFIX . 'login_token_admin');
define('LOGIN_TOKEN_USER', SESSION_PREFIX . 'login_token_user');
define('LOGIN_TOKEN_TIME_ADMIN', SESSION_PREFIX . 'login_token_time_admin');
define('LOGIN_TOKEN_TIME_USER', SESSION_PREFIX . 'login_token_time_user');
define('LOGIN_TOKEN_TIME_ADMIN_LIMIT', 3600);
define('LOGIN_TOKEN_TIME_USER_LIMIT', 3600);


// SYSTEM
define("ADMIN_CONTROLLER", "app/controllers/admin/");
define("CONTROLLER", "app/controllers/");
define('VIEW_PATH', 'template/');

define("TOKENIZER", "_token");
define("ADMIN_URI", "admin");
define("SITE_URL", (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]/fleet_back");
define('DEBUG', true);

define('SITE_NAME', 'SAFARİ YAZILIM');

define('ASSET_PATH', SITE_URL . '/template/fleet/assets');
