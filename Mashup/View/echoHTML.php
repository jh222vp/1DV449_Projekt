<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 2014-12-15
 * Time: 14:09
 */

require_once("./Requests.php");


class echoHTML
{

    public function echoHTML()
    {
        $ret = "<!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <link href='./Style/style.css' rel='stylesheet'>
            <link href='Style/bootstrap-table-master/src/bootstrap-table.css' rel='stylesheet'>
            <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet'>
            <title>Jonas BookSearch</title>
        </head>
        <body>



        <div class='container container-fluid'>
        <div class='page-header'>
        <div class='row'>
            <div class='page-header'>
                <img src='icon.png' style='width:128px;height:128px'><h1>BookSearch</h1>
            </div>
            </div>
            </div>

        <div class='row'>
        <div class='col-md-12'>
        <div class='alert alert-info'>
        <a href='#' class='close' data-dismiss='alert'>&times;</a>
        <strong>Psst!</strong> Du vet väl att du kan sortera böckerna och författarna genom att klicka
        på de fetmarkerade cellerna högst upp!
        </div>
        </div>
        </div>
                <!--HÄR ÄR ETT SÖKFORMULÄR-->
        <div id='tableBackground'>
        <div class='row'>
        <div class='col-md-8 messageListDiv'>
        <form class='navbar-form navbar-left' role='search'>
          <div class='form-group'>
            <input type='text' class='form-control' name='searchQuery' id='searchQuery' placeholder='Search' >
          </div>
          <button type='submit' class='btn btn-default'>Sök</button>
        </form>
        </div>
        </div>


        <div class='btn-group'>
        <div class='col-md-4 messageListDiv'>
        <div id='fbLogin'>
        <fb:login-button scope='public_profile,email' onlogin='checkLoginState();'>
        </fb:login-button>
        </div>
        <div
          class='fb-like'
          data-share='true'
          data-width='450'
          data-show-faces='true'>
        </div>
        </div>
        </div>
</div>

        <table class='table table-striped' data-toggle='table' data-url='cache.json' data-cache='false' data-height='299'  data-click-to-select='true' data-single-select='true' data-pagination='true' data-show-columns='true' data-search='true'  data-align='left' >
        <thead>
            <tr>
                <th data-field='title' data-sortable='true' >Titel</th>
                <th data-field='creator' data-sortable='true'>Författare</th>
                <th data-field='isbn' data-sortable='true'>ISBN</th>
                <th data-field='operate' data-formatter='operateFormatter' data-events='operateEvents'>Ikoner</th>
            </tr>
        </thead>
        </table>

        <div id='status'>
        <div id='fb-root'>
        </div>
        </div>
        </div>
        </div>
        <div id='viewerCanvas' style='width: 800px; height:500px'>
        </div>
        </div>

        <!--Här nedan har vi tre bootstrapgrejer för att tables ska fungera!-->

        <script src='//code.jquery.com/jquery-2.1.3.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
        <script src='Style/bootstrap-table-master/src/bootstrap-table.js'></script>
        <script src='Style/bootbox.min.js'></script>


        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script src='./js/GoogleBook.js'></script>
        <script src='./js/read.js'></script>

        <script src='./js/FaceBookOAuth.js'></script>
        <script src='./js/Book.js'></script>
        </body>

        </html>";
        $this->getSearch();

        return $ret;
    }

    public function getSearch()
    {

        if(isset($_GET['searchQuery']))
        {
            $searchQuery = $_GET['searchQuery'];

            require_once("Requests.php");
            Requests::register_autoloader();

            $request = Requests::get("http://libris.kb.se/xsearch?query=$searchQuery&format=json");


            $data = $request->body;
            $data1 = '{"xsearch": {
                        "from": 1,
                        "to": 10,
                        "records": 94,
                        "list":';

            $whatIWant = substr($data, strpos($data, "["));
            $whatIWant = substr($whatIWant, 0, -2);

            file_put_contents("cache.json", $whatIWant);
        }
        else{
            require_once("Requests.php");
            Requests::register_autoloader();
            $defaultRequest = Requests::get("http://libris.kb.se/xsearch?query=Jonas&format=json");
            file_put_contents("cache.json", $defaultRequest->body);
        }
    }
}