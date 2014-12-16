/**
 * Created by Jonas on 2014-12-15.
 */

var ListOfBookInfo = [];

//Initerar Book.js
function init()
{
    getMessages();
}

function getMessages()
{
    var category;
    $.ajax
    (
        {
            type: "get",
            url: "getBookInfo.php",
            success: function(data)
            {

                data = JSON.parse(data);
                //console.log(data["xsearch"]["list"]);

                for(var i = 0; i < data["xsearch"]["list"].length; i++)
                {
                    addToArray(data["xsearch"]["list"][i]);
                    //setMarker(data["messages"][i].latitude, data["messages"][i].longitude);
                    //setMarker(data["list"][i]);
                }
            }
        }
    )
}

function addToArray(list)
{
    ListOfBookInfo.push(list);
    displayMessage(list.title, list.isbn[0], list.creator);
}

function displayMessage(title, isbn, creator)
{

    var titleID = document.getElementById("Title");
    var creatorID = document.getElementById("Creator");
    var li = document.createElement("li");
    var aTag = document.createElement("a");
    var hRef = document.createElement("href");

    var li2 = document.createElement("li");
    var aTag2 = document.createElement("a");

    aTag.textContent = title;
    aTag.id=isbn;
    aTag.href="#";
    li.appendChild(aTag);
    titleID.appendChild(li);
    aTag.onclick = function()
    {
        getISBN(event.target.id);
    }

    aTag2.textContent = creator;
    li2.appendChild(aTag2);
    creatorID.appendChild(li2);

}



window.addEventListener("load", init());