<?php

define('APP_PATH', dirname(__FILE__) . '/../'); //path to projects directory

require(APP_PATH .'/inc/functions.php');
require(APP_PATH .'/data/fileDataProvider.class.php');
require(APP_PATH .'/data/mysqlDataProvider.class.php');
require(APP_PATH .'/data/data.class.php');
require(APP_PATH .'/inc/config.php');

//Data::initialize(new FileDataProvider(CONFIG['data_file'])); 
Data::initialize(new MysqlDataProvider(CONFIG['db'])); 