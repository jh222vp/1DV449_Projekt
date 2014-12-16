<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 2014-12-15
 * Time: 14:12
 */

require_once("./Requests.php");

Class getBookInfo
{
    public function __construct()
    {
        $dummy = "brown";
        $this->search($dummy);

    }

    public function search($searchQuery)
    {
        Requests::register_autoloader();
        $request = Requests::get("http://libris.kb.se/xsearch?query=$searchQuery&format=json");
        var_dump($request);
        die();
    }

public function searchNewBookInfo($searchQuery)
{
    $this->search($searchQuery);
//file_put_contents("cache.json", $request->body);
    echo file_get_contents("cache.json");
}
}

