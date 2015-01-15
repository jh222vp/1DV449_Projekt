#Rapport av projektet i webbteknik 2
Jonas Holte, jh222vp

###Inledning
I mitt projekt under kursen Webbteknik 2 så har jag valt att arbeta med två APIer från Libris och Google.
Dessa har varit XSearch från Libris som är en nationell söktjänst med information om titlar på svenska bibliotek samt
Google Books API som är en tjänst där man bland annat kan förhandsgranska böcker. Jag har valt att döpa min applikation
till BookSearch. Jag har valt att slå ihop dessa två, så man kan söka efter böcker som finns på biblioteket med XSearch, för att sedan
kunna förhandskgranska (om möjligt) boken via Google Books. Vad jag vet så finns det ingen liknande tjänst som tillämpar
denna funktionalitet.

###Serversida
Vid serversidan så gör jag anrop till ett av mina två APIer. Detta är mot XSearch och sköts med hjälp av PHP. Anropet
görs som så att kontroll sker ifall användare har skrivit in någonting i sökrutan och tryck på "SÖK". Då tvättas inputet
från farliga tecken med stripe_tags för att få bort farligheter och möjligheter till attacker. Man behöver inte någon form
av API nyckel eller liknande utan det går bra att enkelt modifiera söksträngen till önskad typ och sedan skicka in den.
Svaret jag får på förfrågan från XSearch putsar jag sedan till så att Bootstrap-Tables ska kunna läsa det och sparar det
slutligen i en cache.json fil. Jag presenterar sedan ut datan till en tabell och läser därifrån min JSON fil och skriver ut
den i tabellen.

###Klientsidan
På klientsidan så har jag en sökruta med tillhörande sökknapp, dessa används för att söka efter böcker/författare/ISBN
osv. Sökningen presenteras sedan ut i en tabell där alla resultaten delas upp i olika kolumner så som 'Titel', 'Författare'
'ISBN' osv. Jag får även ut två ikoner i tabellen - dessa ser ut som en kundvagn, samt ett öga. Klickar man på ögat så
skickas tillhörande ISBN nummer via Javascript till scriptfilerna som hanterar Google Books API. Därifrån så gör vi ett
uppslag mot Google Books och försöker förhandsvisa boken med hjälp av ISBN-nummret. Skulle det inte finnas en bok eller
ISBN-numret är inkorrekt så får användaren ett felmeddelande som talar om att det inte gick att förhandsgranska boken.
Skulle det därimot gå bra så svarar Google Books med att presentera boken i förhandsvisningsformat på sidan.
Klickar användaren på kundvagnsikonen så skickas man istället till Adlibris.com där jag också slänger med samma ISBN nummer
som jag nämnde tidigare. Ett uppslag görs och användaren kan eventuellt - om möjligt - köpa boken.

###Säkerhet och prestandaoptimering
Säkerhetsmässigt så har jag försökt att ta bort farliga tecken vid min sökfunktion genom att använda stripe_tags vid sökinput
från användaren. Detta dels för att det inte ska gå att presentera något farligt på min hemsida. Men också för att skona Libris samt Google
mot farligheter. Prestandamässigt så har jag bland annat minifierade scriptfiler och en Manifestfil som ser till att cacha
statiska filer så det ska gå att ladda filerna något fortare vid besök på hemsidan.


###Offline-first
Jag har min manifestfil som ser till att cacha statiska filer och script så jag bl.a kan hålla koll på om nätverksanslutningen
skulle gå ned för användaren. Skulle nätverket gå ned så varnas användaren om det och lämplig åtgärd rekomenderas.
Eftersom att Google Books inte tillåtet cachning av deras filer och material så kunde jag inte spara ned något material från
detta APIet. Skulle nätverket gå ned när användaren t.ex sitter på tåget eller i en bilkö i en tunnel så går det fortfarande bra att bläddra
bland sina tidigare resultat i tabellen. 

###Egen reflektion kring projektet
Projektet har varit en utmaning, det har varit strul fram och tillbaka mellan den lokala utvecklingsmiljön där en sak fungerade
men som sedan visade sig inte fungerade upp mot internet. Så en hel del omskrivning av kod har det blivit. Fick lägga 
en hel del tid på att luska ut varför bootstrap-tables inte kunde läsa den JSON fil som jag fick från ett av APIerna men tillslut
få ordning på det. Det har varit roligt och lärorikt att jobba med två APIer och ta reda på hur man kan hantera dessa två tillsammans.
Jag skulle vilja ha så att man kan få färger i tabellen som talat om vilka böcker som går att förhandsgranska ifrån GoogleBooks och
vilka som inte går.

###Risker med din applikation
En risk är att GoogleBooks är beroende av att Libris XSearch fungerar, eftersom att om Libris skulle gå ned så kan man inte
söka efter olika böcker och därefter inte heller har någon nytta av GoogleBooks api. 