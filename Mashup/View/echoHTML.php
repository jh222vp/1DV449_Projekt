<?php
/**
 * Created by PhpStorm.
 * User: Jonas
 * Date: 2014-12-15
 * Time: 14:09
 */

require_once("Requests.php");


class echoHTML
{

    public function echoHTML()
    {
        $ret = "<!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <link href='./Style/style.css' rel='stylesheet'>
            <link href='//cdn.bootcss.com/bootstrap-table/1.3.0/bootstrap-table.min.css' rel='stylesheet'>
            <link rel='stylesheet' href='Style/bootstrap-table-master/src/bootstrap-table.css'>
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
        <strong>Info!</strong> Välkommen till Jonas Boksök.
        </div>

        <!--HÄR ÄR ETT SÖKFORMULÄR-->
        <form class='navbar-form navbar-left' role='search' >
          <div class='form-group'>
            <input type='text' class='form-control' name='searchQuery' id='searchQuery' placeholder='Search' >
          </div>
          <button type='submit' class='btn btn-default'>Submit</button>
        </form>

        <div class='row'>
        <div
          class='fb-like'
          data-share='true'
          data-width='450'
          data-show-faces='true'>
        </div>







<table id='myTable'>
  <tr>
    <td>hody cell1</td>
    <td>Row1 cell2</td>
  </tr>
  <tr>
    <td>Row2 cell1</td>
    <td>Row2 cell2</td>
  </tr>
  <tr>
    <td>Row3 cell1</td>
    <td>Row3 cell2</td>
  </tr>
</table>











<h2>Tabell Med Info</h2>
  <p>Här nedan ser vi frukten av vårt arbete.</p>
  <table id='table table-striped'>
    <thead>
      <tr>
        <th>Titel</th>
        <th>Författare</th>
        <th>ISBN</th>
      </tr>
    </thead>

    <tbody>



      <tr class='success'>
        <td><a href='#'>Brandvägg</a></td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>


      <tr class = 'danger'>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>


      <tr class='success'>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>




    </tbody>
  </table>



        <h2>Creator</h2>
        <div id='Creator' class='col-md-5'>
        </div>

        <fb:login-button scope='public_profile,email' onlogin='checkLoginState();'>
        </fb:login-button>

        <div id='status'>
        <div id='fb-root'>
        </div>
        </div>
        </div>
        </div>
        <div id='viewerCanvas' style='width: 600px; height:500px'>
        </div>

        <script src='jquery.min.js'></script>
        <script src='//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js'></script>
        <script src='bootstrap.min.js'></script>
        <script src='Style/bootstrap-table-master/src/bootstrap-table.js'></script>

        <script src='./js/jquery-1.10.2.min.js'></script>
        <script type='text/javascript' src='https://www.google.com/jsapi'></script>
        <script src='./js/GoogleBook.js'></script>

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
            file_put_contents("cache.json", $request->body);
        }
        else{
            require_once("Requests.php");
            Requests::register_autoloader();
            $defaultRequest = Requests::get("http://libris.kb.se/xsearch?query=&format=json");
            file_put_contents("cache.json", $defaultRequest->body);
        }
    }
}