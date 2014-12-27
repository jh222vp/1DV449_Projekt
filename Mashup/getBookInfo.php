<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 2014-12-15
 * Time: 14:12
 */

//require_once("Requests.php");
require_once("./View/echoHTML.php");
$view = new echoHTML();

Requests::register_autoloader();

//$request = Requests::get("http://libris.kb.se/xsearch?query=python&format=json");
//echo $request->body;
//echo json_encode($view->getSearch());
//echo file_get_contents("./cache.json");
