/**
 * Created by Jonas on 2014-12-15.
 */

var ListOfBookInfo = [];
var x;
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
            url: "cache.json",
            success: function(data)
            {
                //data = JSON.parse(data);
                for(var i = 0; i < data.length; i++)
                {
                    addToArray(data[i]);
                }
            }
        }
    )
}

function addToArray(list)
{
    if( Object.prototype.toString.call( list.isbn ) === '[object Array]' )
    {
        list.isbn.pop();
        console.log(list);
        console.log("nu är den poppad!");
    }
    else
    {
        console.log("INGEN JÄVLA ARRAY")
    }
    ListOfBookInfo.push(list);
}

window.addEventListener("load", init());