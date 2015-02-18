<?php header('Access-Control-Allow-Origin: *');
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 2014-12-15
 * Time: 14:09
 */
require_once("./Requests.php");
require_once("./API_Request.php");


class echoHTML
{
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
            <div id='connectID' class='col-md-12'>
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

        <!--Tabell som läser från local storage och listas ut innehåller till DOMen-->
        <table id='table'></table>



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
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script src='./js/GoogleBook.js'></script>
        <script src='./js/read.js'></script>
        <script src='./js/ja.js'></script>
        </body>

        </html>";
        return $ret;
    }
}