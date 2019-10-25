<?php

    define('ROOT', dirname(__DIR__));
    const APP = ROOT.'/app';

    const VIEWS = ROOT.'/app/Views';
    const CONTROLLERS ="\App\Controllers\\";

    const MODELS = ROOT.'/app/Models/';
    const CONFIG = ROOT.'/config';
    
    const CORE = ROOT.DIRECTORY_SEPARATOR.'core';
    const EXT = '.php';
    const APPNAME = 'Great Shopaholic';
    const SLOGAN = 'Lets Build Cool Site';

    define('LOGS', ROOT.'/logs');
    define('DB_CONFIG_FILE', CONFIG.'/db.php');

    define('ROUTES', require CONFIG.'/routes'.EXT);
    
    const SESSION_PREFIX = 'shop_';