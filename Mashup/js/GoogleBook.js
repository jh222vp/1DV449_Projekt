/**
 * Created by Jonas on 2014-12-15.
 */

function getISBN(ISBN)
{
    previewBook(ISBN)
}

function previewBook(ISBN)
{
    var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
    viewer.load('ISBN:'+ISBN, alert);
}

function alert()
{
    bootbox.alert("Tyvärr gick det inte att förhandsgranska boken på grund av olika anledningar." +
    " Troligtvis för att den inte finns hos Google Books.  Bättre lycka vid nästa bok!")
}

function readBook(ISBN)
{
    var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
    viewer.load('ISBN:'+ISBN, alertNotFound);
}

function alertNotFound()
{
    console.log("Här syns ingen bok!")
}

google.setOnLoadCallback(readBook);
google.load('books', '0');
