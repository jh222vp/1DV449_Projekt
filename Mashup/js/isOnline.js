/**
 * Created by Jonas on 2015-01-13.
 */

function init()
{
    /*Här utför vi en kontroll om användaren har tappat nätverksanslutning
    Om så är fallet så alertas ett meddalnde ut som talar om att användaren är offline
    och borde uppdatera sidan när anslutningen är tillbaka. Sökfunktionen inaktiveras samt knappen.
    Tabellen med info från APIerna tas bort då den inte innehåller något*/

    if(navigator.onLine == false)
    {
        bootbox.alert("Det verkar som om du är offline! Några eller alla funktioner kan vara satt ur spel i applikationen,"+
        " ladda om hemsidan (F5) för att kontrollera nätverksanslutning");
        $(".table").remove();
        document.getElementById('searchQuery').disabled = true;
        document.getElementById("myBtn").disabled = true;
    }
}

window.onload = init();