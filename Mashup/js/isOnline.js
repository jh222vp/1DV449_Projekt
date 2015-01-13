/**
 * Created by Jonas on 2015-01-13.
 */

function init()
{
    alert("hej");
    if(navigator.onLine == false)
    {
        alert("offline");
        bootbox.alert("Tyvärr gick det inte att förhandsgranska boken på grund av olika anledningar." +
        " Troligtvis för att den inte finns hos Google Books.  Bättre lycka vid nästa bok!");
    }
}

window.addEventListener('load', function(){
    alert("loaded");
});
window.onload = init;