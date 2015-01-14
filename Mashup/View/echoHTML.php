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
private static $search = 'searchQuery';

    public function echoHTML()
    {
        $ret = "<!DOCTYPE html>

        <!--Manifest fil som håller i vad som ska cachas, repspektive inte cachas i klienten-->
        <html manifest='CacheManifest.appcache'>
        <head>
            <meta charset='UTF-8'>
            <link href='Style/bootstrap-table-master/src/bootstrap-table.css' rel='stylesheet'>
            <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet'>
            <link href='./Style/style.css' rel='stylesheet'>
            <title>BookSearch</title>
        </head>
        <body>

        <div class='container container-fluid'>
        <h1>BookSearch</h1>

        <!--Kryssbar ruta som tipsar användaren om att sortering är möjlig i tabellen-->
        <div class='row'>
            <div class='col-md-12'>
                <div class='alert alert-info'>
                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                    <strong>Psst!</strong>
                    Du vet väl att du kan sortera böckerna och författarna genom att klicka
                    på de fetmarkerade cellerna högst upp!
                </div>
            </div>
        </div>

        <!--Nedan är ett sökformulär samt en knapp där vi utför sökning på böcker-->
        <div id='searchBackground'>
            <div class='row'>
                <div class='col-md-8 messageListDiv'>
                    <form class='navbar-form navbar-left' role='search'>
                        <div class='form-group'>
                            <input type='text' class='form-control' name='searchQuery' id='searchQuery' placeholder='Sök bokinfo här'>
                        </div>
                        <button type='submit' id='myBtn' class='btn btn-default'>Sök</button>
                    </form>
                </div>
            </div>

        <!--Här nedan är facebookLIKE, Login och SHARE-->
            <div class='btn-group'>
                <div class='col-md-4 messageListDiv'>
                    <div id='fbLogin'>
                        <fb:login-button scope='public_profile,email' onlogin='checkLoginState();'>
                        </fb:login-button>
                    </div>
                        <div class='fb-like' data-share='true' data-width='450' data-show-faces='true'>
                        </div>
                </div>
            </div>
            <script src='./js/FaceBookOAuth.js'></script>
        </div>

        <!--Tabell som läser från cache.json fil och listas ut innehåller till DOMen-->
        <table class='table' data-toggle='table' data-url='./Cache/cache.json' data-cache='false' data-height='399'  data-click-to-select='true' data-single-select='true' data-pagination='true' data-show-columns='true' data-search='true'  data-align='left' >
        <thead>
            <tr>
                <th data-field='title' data-sortable='true'>Titel</th>
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
        <div id='viewerCanvas' style='width: 800px; height:500px'>
        </div>

        <!--Scriptfiler-->
        <script src='//code.jquery.com/jquery-2.1.3.min.js'></script>
        <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
        <script src='./js/bootstrap-table-master/src/bootstrap-table.js'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js'></script>
        <script src='./js/isOnline.js'></script>
        <script src='./js/read.js'></script>
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script src='./js/GoogleBook.js'></script>
        </body>
        </html>";
        $this->getSearch();
        return $ret;
    }

    public function getSearch()
    {
        if(isset($_GET[self::$search]))
        {
            /*Hämtar indatan från användaren, tvättar inputet från farliga tecken.
             Utför sedan request mot libris via XSearch API med indatan från användaren.
            Tar emot svar och lagrar i en variabel, snyggar till svaret och sparar
            det sedan i en fil vid namn cache.json.*/

            $searchQuery = $_GET[self::$search];
            $cleanSearchQuery = strip_tags ($searchQuery);

            Requests::register_autoloader();
            $request = Requests::get("http://libris.kb.se/xsearch?query=$cleanSearchQuery&format=json&n=200");
            $data = $request->body;

            $whatIWant = substr($data, strpos($data, "["));
            $whatIWant = substr($whatIWant, 0, -2);
            file_put_contents("./Cache/cache.json", $whatIWant);
        }
    }
}