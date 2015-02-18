/**
 * Created by Jonas on 2014-12-15.
 */

function getISBN(ISBN)
{
    previewBook(ISBN)
}

//Funktion som förhandsgranskar önskad bok.
function previewBook(ISBN)
{
    console.log(ISBN);
    var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
    viewer.load('ISBN:'+ISBN, alert);
}

//Felmeddelande som visas när användaren inte kan förhandsgranska en bok.
function alert()
{
    bootbox.alert("Tyvärr gick det inte att förhandsgranska boken på grund av olika anledningar." +
    " Troligtvis för att den inte finns hos Google Books.  Bättre lycka vid nästa bok!")
}

//Första funktionen som körs.
function readBook(ISBN)
{
    var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
    viewer.load('ISBN:'+ISBN, alertNotFound);
}

function alertNotFound()
{
    //Empty, behöver ingen varning vid första gången sidan körs..
}

google.setOnLoadCallback(readBook);
google.load('books', '0');
