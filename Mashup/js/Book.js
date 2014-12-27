/**
 * Created by Jonas on 2014-12-15.
 */

var ListOfBookInfo = [];
var x;
//Initerar Book.js
function init()
{
    myCreateFunction();
    getMessages();
}

function myCreateFunction() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = "NEW CELL1";
    cell2.innerHTML = "NEW CELL2";
    cell2.innerHTML = "YES DET FUNKAR!!";
}

function getMessages()
{
    var category;
    $.ajax
    (
        {
            type: "get",
            url: "cache.json",
            success: function(data)
            {
                console.log("Nu går vi in i ajaxen");
                //data = JSON.parse(data);
                console.log(data);

                for(var i = 0; i < data["xsearch"]["list"].length; i++)
                {
                    console.log("och i loopen");
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
    displayMessage(list.title, list.isbn, list.creator);
}

function displayMessage(title, isbn, creator)
{
    //var titleID = document.getElementById("Title");
    //var creatorID = document.getElementById("Creator");

    var tableID = document.getElementById("table table-striped");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);

    cell1.innerHTML = "NEW CELL1";
    cell2.innerHTML = "NEW CELL2";

    /*
    var tHead = document.createElement("tHead");
    var tr = document.createElement("tr");
    var td = document.createElement("td");
    var aTag = document.createElement("a");
    var hRef = document.createElement("href");

    /*var li = document.createElement("li");
    var aTag = document.createElement("a");
    var hRef = document.createElement("href");
    var li2 = document.createElement("li");
    var aTag2 = document.createElement("a");*/

    //Kontroll för om det finns fler ISBN nummer i en array. Isåfall tar vi ut det första av dem.
    if( Object.prototype.toString.call( isbn ) === '[object Array]' )
    {

        aTag.textContent = title;
        aTag.id = isbn[0];
        aTag.href = "#";

        //tableID.appendChild(tr);
        //tr.appendChild(td);
        //td.appendChild(aTag);




        //li.appendChild(aTag);
        //titleID.appendChild(li);

        aTag.onclick = function (event)
        {
           getISBN(event.target.id);
        }

        aTag2.textContent = creator;
        li2.appendChild(aTag2);
        creatorID.appendChild(li2);
    }
    else
    {
        aTag.textContent = title;
        aTag.id = isbn;
        aTag.href = "#";
        li.appendChild(aTag);
        titleID.appendChild(li);

        aTag.onclick = function (event) {
            getISBN(event.target.id);
        }

        aTag2.textContent = creator;
        li2.appendChild(aTag2);
        creatorID.appendChild(li2);
    }
}

window.addEventListener("load", init());