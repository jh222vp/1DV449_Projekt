/**
 * Created by Jonas on 2015-01-13.
 */

/*Här utför vi en kontroll om användaren har tappat nätverksanslutning
 Om så är fallet så alertas ett meddalnde ut som talar om att användaren är offline
 och borde uppdatera sidan när anslutningen är tillbaka. Sökfunktionen inaktiveras samt knappen.
 Tabellen med info från APIerna tas bort då den inte innehåller något*/

var online = true;

function init()
{
    setInterval(function()
    {
        CheckConnection();
    },3000)
    var connectedDIV = document.getElementById("connectID");
    if(online)
    {
        var message = document.createElement("p");
        message.className = "alert alert-success";
        message.textContent = "Du är Online";
        connectedDIV.appendChild(message);
    }
    else
    {
        var message = document.createElement("p");
        message.className = "alert alert-danger";
        message.textContent = "Du är Offline";
        connectedDIV.appendChild(message);
    }
}

function CheckConnection()
{
    $.ajax({
        type: 'GET',
        url: 't.json',
        success: function (response) {

            if (response.Connected && online === false)
            {
                online = true;
                document.getElementById("connectID").className = "alert alert-success";
                document.getElementById("connectID").innerText = "Du är ONLINE"
                document.getElementById('searchQuery').disabled = false;
                document.getElementById("myBtn").disabled = false;
            }
        },
        error: function () {
            offline();
        }
    });
}

function offline()
{
    if(online)
    {
        bootbox.alert("Det verkar som om du är offline! Några eller alla funktioner kan vara satt ur spel i applikationen,"+
        " ladda om hemsidan för att kontrollera nätverksanslutning");
        document.getElementById('searchQuery').disabled = true;
        document.getElementById("myBtn").disabled = true;
        document.getElementById("connectID").className = "alert alert-danger";
        document.getElementById("connectID").innerText = "Du är OFFLINE";
        online = false;
    }
}

window.onload = init;