<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 2014-12-15
 * Time: 14:09
 */

//Öppnar anslutning till filen "echoTML.php" där vi renderar ut HTML
require_once("./View/echoHTML.php");

$view = new echoHTML();
echo $view->echoHTML();
