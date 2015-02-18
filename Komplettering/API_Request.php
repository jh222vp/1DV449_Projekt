<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 2015-02-09
 * Time: 13:26
 */
require_once("./Requests.php");
$testObject = new API_Request();

if (isset($_POST['Add']))
{
    $search = $_POST['Add'];
    $testObject->check($search);
}

class API_Request
{
    public function check($search)
    {
        $cleanSearchQuery = strip_tags($search);

        Requests::register_autoloader();
        $request = Requests::get("http://libris.kb.se/xsearch?query=$cleanSearchQuery&format=json&n=100");
        $data = $request->body;

        $whatIWant = substr($data, strpos($data, "["));
        $whatIWant = substr($whatIWant, 0, -2);
        file_put_contents("./Cache/cache.json",$whatIWant);
        echo $whatIWant;
    }
}