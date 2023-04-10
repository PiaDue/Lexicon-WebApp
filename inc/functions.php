<?php
/**
 * redirect to an other page
 * @param $path- from root dir to the next page  
 */
function redirect($path)
{
    header("Location: $path");
}

function autenticate_user($username, $password)
{
    foreach (CONFIG['users'] as $user) {
        if (array_key_exists($username, $user)) {
            return $user[$username] == $password;
        }
        return false;
    }
}

function user_is_loged_in()
{
    return isset($_SESSION['username']);
}

/**
 * requires a certain file from the views folder
 * @param mixed $view name of the view file
 * @param mixed $model model object
 */
function view($view, $model = '')
{
    require(APP_PATH . "/views/$view.php");
}

function received_post_req():bool {
    return  $_SERVER['REQUEST_METHOD'] === 'POST' ;
}

function received_get_req():bool {
    return  $_SERVER['REQUEST_METHOD'] === 'GET' ;
}

function sanitize_string(string $value){
    $temp = trim($value);
    $temp = filter_var($temp, FILTER_UNSAFE_RAW);

    if($temp === false){
        return '';
    }
    return $temp;
}
