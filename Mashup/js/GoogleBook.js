/**
 * Created by Jonas on 2014-12-15.
 */

function getISBN(ISBN)
{
    readBook(ISBN)

}

function readBook(ISBN)
{
    console.log(ISBN);
    var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
    viewer.load(ISBN);
}

var defaultISBN = 'ISBN:0738531367';
google.setOnLoadCallback(readBook);
google.load('books', '0');
