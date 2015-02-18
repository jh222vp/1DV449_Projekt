#Rapport av projektet i webbteknik 2
Jonas Holte, jh222vp

###Inledning
I mitt projekt under kursen Webbteknik 2 så har jag valt att arbeta med två APIer från Libris och Google.
Dessa har varit XSearch från Libris som är en nationell söktjänst med information om titlar på svenska bibliotek samt
Google Books API som är en tjänst där man bland annat kan förhandsgranska böcker. Jag har valt att döpa min applikation
till BookSearch.

Jag har valt att slå ihop dessa två, så man kan söka efter böcker som finns på biblioteket med XSearch, för att sedan
kunna förhandskgranska (om möjligt) boken via Google Books. Vad jag vet så finns det ingen liknande tjänst som tillämpar
denna funktionalitet.

###Serversida
Vid serversidan så gör jag anrop till ett av mina två APIer. Detta är mot XSearch och sköts med hjälp av PHP. Anropet
görs som så att kontroll sker ifall användare har skrivit in någonting i sökrutan och tryck på "SÖK". Då tvättas inputet
från farliga tecken med stripe_tags för att få bort farligheter och möjligheter till attacker.