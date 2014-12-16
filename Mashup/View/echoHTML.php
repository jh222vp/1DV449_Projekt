<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 2014-12-15
 * Time: 14:09
 */

require_once("./getBookInfo.php");

class echoHTML
{
    private $getBook;

    public function __construct()
    {
        $this->getBook = new getBookInfo();
    }
    public function echoHTML()
    {
        $ret = "<!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <link href='./Style/style.css' rel='stylesheet'>
            <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet'>
            <title>Jonas BookSearch</title>
        </head>

        <body>
        <div class='container container-fluid'>
        <div class='page-header'>
        <h1>BookSearch</h1>
        </div>

        <div class='alert alert-info'>
        <a href=''#' class='close' data-dismiss='alert'>&times;</a>
        <strong>Info!</strong> Välkommen till Jonas Boksida.
        </div>

        <form class='navbar-form navbar-left' role='search' >
          <div class='form-group'>
            <input type='text' class='form-control' name='searchQuery' placeholder='Search' >
          </div>
          <button type='submit' class='btn btn-default'>Submit</button>
        </form>

        <div class='row'>

        <h2>Title</h2>
        <div id = 'Title' class='col-md-5'>
        </div>

        <h2>Creator</h2>
        <div id='Creator' class='col-md-5'>
        </div>


        </div>
        </div>
        <div id='viewerCanvas' style='width: 600px; height:500px'>
        </div>

        <script src='./js/jquery-1.10.2.min.js'></script>
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script src='./js/GoogleBook.js'></script>
        <script src='./js/Book.js'></script>

        </body>
        </html>";
        $this->getSearchQuery();

        return $ret;
    }

    public function getSearchQuery()
    {
        if(isset($_GET['searchQuery']))
        {
            $searchQuery = $_GET['searchQuery'];
            $this->getBook->searchNewBookInfo($searchQuery);
        }
    }
}