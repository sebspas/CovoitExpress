<?php
class Config {
    public static $debug = true;

    public static $dbInfo = array(
        'driver' => 'mysql:host=51.255.41.18;port=3306;dbname=covoitexpress',
        'username' => 'sebspas',
        'password' => 'aqwedc7'
    );

    public static $dbInfoLocal = array(
        'driver' => 'mysql:host=localhost;port=3306;dbname=covoitexpress',
        'username' => 'root',
        'password' => ''
    );

    public static $path = array(
        'header' => 'app/layout/header.php',
        'footer' => 'app/layout/footer.php',
        'views' => 'app/view/',
        'controller' => 'app/controller/',
        'model' => 'app/model/',
        'css' => 'asset/css/',
        'images' => 'asset/images/',
        'js'    => 'asset/js/'
    );
}