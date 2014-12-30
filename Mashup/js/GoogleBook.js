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
    bootbox.alert("Tyvärr gick det inte att förhandsgranska denna boken på grund av olika anledningar. Bättre Lycka nästa gång!")
}

function readBook(ISBN)
{
    var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
    viewer.load('ISBN:'+ISBN, alertNotFound);
}

function alertNotFound()
{
    console.log("Schhhhh!!")
    //bootbox.alert("Den här boken gick inte att förhandsgranska")
}

google.setOnLoadCallback(readBook);
google.load('books', '0');
