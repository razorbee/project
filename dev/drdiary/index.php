<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/


function file__get_contents(){
    $ct = func_num_args(); // number of argument passed
 $r = "";
 echo "-----file__get_contents-----".func_get_arg(0);
 if (strpos(func_get_arg(0), 'http') !== false) {
    return "";
 }
 
    //echo "########".(func_get_arg(0))."<br/>";
     if ($ct==1){
       $r = file_get_contents(func_get_arg(0));
 
    }
    else if ($ct==2){
      $r = file_get_contents(func_get_arg(0),func_get_arg(1));
    }
    else if ($ct==3){
      $r = file_get_contents(func_get_arg(0), func_get_arg(1),func_get_arg(2));
    }else if ($ct==4){
      $r = file_get_contents(func_get_arg(0), func_get_arg(1),func_get_arg(2),func_get_arg(3));
    }else if ($ct==5){
      $r = file_get_contents(func_get_arg(0), func_get_arg(1),func_get_arg(2),func_get_arg(3),func_get_arg(4));
    }else{
      $r = file_get_contents();
    }
    exit();
    return $r;
 }
 function curl__init(){
    $ct = func_num_args(); // number of argument passed
 $r = "";
 
 if (strpos(func_get_arg(0), 'http') !== false) {
    return "";
 }
 
    //echo "########".(func_get_arg(0))."<br/>";
     if ($ct==1){
       $r = curl_init(func_get_arg(0));
 
    }
    else if ($ct==2){
      $r = curl_init(func_get_arg(0),func_get_arg(1));
    }
    else if ($ct==3){
      $r = curl_init(func_get_arg(0), func_get_arg(1),func_get_arg(2));
    }else if ($ct==4){
      $r = curl_init(func_get_arg(0), func_get_arg(1),func_get_arg(2),func_get_arg(3));
    }else if ($ct==5){
      $r = curl_init(func_get_arg(0), func_get_arg(1),func_get_arg(2),func_get_arg(3),func_get_arg(4));
    }else{
      $r = curl_init();
    }
    exit();
    return $r;
 }


$app = require_once __DIR__.'/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
