<?php
if($_SERVER["REQUEST_METHOD"] !== "GET") exit;
//if(!empty($_GET)) exit;
header("Cache-Control: max-age=604800,public");
?>
{"0":"Glavna","1":"Brisi poruku","2":"Gosti","3":"Prijatelji","4":"Posalji","5":"Kreiraj svoj chat box","6":"Chat grupe","7":"Pomoc","8":"Web link","9":"Jos smajlija","10":"Zvuk uklj.","11":"Zvuk isklj,","12":"Klikni na $1 da menjas nick","13":"Idi na$1 Grupu","14":"Pomoc","15":"Promeni sliku","16":"Kontaktiraj sa $1","17":"ako autolink ne radi, kopiraj u svoj pretrazivac","18":"Promeni svoj nick,sliku i stranicu","19":"uloguj se","20":"privatna poruka","21":"idi na adresu","22":"clan","23":"moderator","24":"vlasnik","25":"bannovan","26":"klikni za pokretanje chata","27":"klikni da zaustavis chat","28":"promeni pozadinu chata,dodaj ili promeni grupu,preuzmi extra dodatke za svoj chat","29":"postavi svoj chat box na svoju web stranicu","30":"za promenu imena ili slike klikni ovde: $1","31":"izloguj se","32":"konekcija....","33":"nisi bio aktivan neko vreme. klikni na uloguj se da bi reaktivirao svoj log in","34":"uredi svoj chat","35":"klikni nauloguj se da pokrenes chat, da bi automatski bili logovani,idite na vas profil i izaberite opciju[uloguj se automatski].","36":"pokrenuo si chat u drugom prozoru. kilkni na uloguj se za restart chata","37":"ovaj chat je zatvorenog tipa,posaljite pp vlaniku ili moderatoru i pitajte za pridruzivanje","38":"upisi link,web stranu ili kljucne reci","39":"izaberi sliku","40":"pozadina","41":"upisi ime grupeovde -CRili izaberi gore","42":"chat grupe su slobodnechat sobe,kao lobi,ali za specificnu upotrebu.mozes ih postaviti kao grupni link, u svij chat box","43":"kreiraj novu grupu","44":"edituj xat.com Chat Box","45":"OK","46":"promeni pozadinu","47":"promeni grupu","48":"podesi bilo koju, sirinu ili visinu. reklamiraj svoj chat box.dodaj anketu,kviz ili slide show na svoju web stranu","49":"extra dodaci","50":"uredi svoj chat box","51":"izradi svoj chat box","52":"konekcija u toku,molim sacekaj te","53":"pregled grupe","54":"pretraga neuspela,CRmolim pokusaj te ponovo","55":"IZVINITE.uredjivanje chata trenutno nedostupno.CRmolim pokusajte kasnije","56":"pregled","57":"klikni za koriscenje","58":"profil","59":"novi korisnik","60":"ime","61":"slika","62":"glavna strana","63":"izaberi od 100s slika na web-u","64":"jos...","65":"uloguj me automatski","66":"otkazi","67":"idi na glavnu stranu","68":"nema glavne strane","69":"privatni chat","70":"pokreni privatni chat","71":"privatna poruka","72":"posalji pp","73":"izbaci iz prijatelji","74":"dodaj u prijatelji","75":"dodaj\/izbaci iz prijatelji","76":"ignorisi","77":"ukini ignorisanje","78":"ignorisi\/ukini ignorisanje za ovog korisnika","79":"izbaci","80":"izbaci korisnika kao upozorenje","81":"banuj","82":"ukini ban","83":"spreci clana da pise poruke","84":"uclani","85":"izclani","86":"uclani\/izclani kao korisnika","87":"otkazi moderatora","88":"dodaj moderatora","89":"dodaj\/otkazi moderatora","90":"odbanovan sam","91":"idi kod prijatelja","92":"kreiraj chat box","93":"kopiraj chat box kod i zalepi na svoju web stranu","94":"kopiraj kod","95":"kopiraj kodove u clipboard","96":"kopirano","97":"sad zalepi na svoju web stranicu (Ctrl-V)","98":"problem u konekciji. moras pokrenuti chat ponovo. IZVINITE","99":"molimo vas nemoj te nikome davati svoju sifru, mi vas nikada necemo pitati za vasu sifru.","100":"konekcioni problem","101":"prijavi ban zloupotrebu","102":"vrati se na chat","103":"nadji drugu grupu","104":"kopiraj adresu","105":"link je kopiran","106":"molimo idite na svoj pretrazivac i upotrebite Ctrl-V u address box-u","107":"vi ste","108":"na xat","109":"online","110":"offline","111":"prijatelj","112":"ignorisan","113":"razlog za ban","114":"razlog za kick","115":"trajanje","116":"sati","117":"(0 zauvek)","118":"(maksimalno 6)","119":"banovan sam $1 zauvek bez razloga","120":"banovan sam $1na $2 sati bez razloga","121":"banovan sam $1 zauvek. razlog: $2","122":"banovan sam $1 na $2 sati. razlog: $3","123":"izbacen sam $1 razlog: $2","124":"nemozes nekoga izbaciti bez razloga","125":"ti si bannovan","126":"nisi dodat u prijatelje","127":"$1 te je bannovao","128":"dodao sam $1 za moderatora","129":"na $1","130":"vise nije moderator $1","131":"preuzmi","132":"dodao sam$1 kao clana","133":"iskljucen iz clanstva $1","134":"vlasnik","135":"dodaj ga za gosta","136":"dodaj ga za vlasnika","137":"dodao sam $1 za vlasnika","138":"dodao sam $1 za gosta","139":"preuzmi zabavne stvari","140":"Vidi xatspace","141":"Pozovi sve IM prijatelje na ovaj chat","142":"Dodaj IM prijatelje. Pocni sa IM verzijom cheta.","143":"Na App","144":"Otpocni IM","145":"Pocni sa IM verzijom cheta.","146":"Molim vas prijavite se za IM prvo.","147":"$1 prijatelji su pozvani na chat.","148":"Vencaj se\/Najbolji prijatelj","149":"Odgovori","150":"Razvedi se","151":"Predaj xetove i dane","152":"Ozenjen\/udata za","153":"Najbolji prijatelj sa","154":"Regiruj se...","155":"Regisgruj se, Uloguj se, Izloguj se itd.","156":"Na MSN-u","157":"Na AIM-u","158":"pretplatnik","159":"registrovan","160":"BFF","161":"Ozenjen\/udata","162":"Odgovor od $1 xetova i $2 dana\/nod $3 za $4 zavrsenCR","163":"psovka,reci,malo,ne,prostori,voli,ovo","164":"Korisnik nije pronadjen","165":"pogresna sifra","166":"korisnik nije potvrdio registraciju email-a","167":"Nema dovoljno xetova","1000":"BB kako da promenim nick,sliku i glavnu stranu?","1001":"klikni na svoj nick na vrhu korisnicke liste, na desnoj strani","1002":"BB kako i ja da imam svoj xat chat box?","1003":"klikni na [moj chat box] dugme na dnu desno","1004":"BB kako da pronadjem jos ljudi da chatuju?","1005":"poseti http:\/\/xat.com\/groups ili klikni na dugme group chat","1006":"BB da li sam nesto propustio?","1007":"preuzmi dodatne smajlije sa http:\/\/xat.com\/smilies dodaj zvucne efekte u svoju poruku sa http:\/\/xat.com\/audies npr. _raspberry raspberry _giddy giddy _ohh ohh","1008":"BB mogu li biti bezbedan online?","1009":"idi na http:\/\/xat.com\/safety.html za vise informacija","1010":"BB ikonice pored nicka su razlicitih boja? sta one znace?","1011":"zelena je online,crvena je offline,zlatna je vlasnik,srebrna je moderator,plava je korisnik","1012":"BB kako da iskljucim autologin?","1013":"idi na svoju glavnu stranicu odcekiraj automatsko logovanje. u buduce ces morati svaki put da se logujes klikom na dugme[loguj se]da bi pristupio chat box-u i listi korisnika.","1014":"BB kakvu jos pomoc mogu dobiti?","1015":"poseti http:\/\/xat.com\/help ili posalji email na info@xat.com","1017":"BB ZA VLASNIKE CXAT BOX-a","1019":"BB kako da promenim pozadinu?","1020":"klikni na[uredi svoj chat]dugme na dnu i ponovo klikni na[pozadina] dugme","1021":"BB kako da dodam chat grupu,napredne dodatke,dozvoliti korisnicima samo da chatuju i kako da promenim velicinu prozora za chat box?","1022":"klikni na [uredi svoj chat] i izaberi grupu. za dodatke klikni na dugme [extra dodatci]","1023":"BB kako da privucem vise korisnika na svoj chat box?","1024":"reci svojim prijateljima ili korisnicima iz drugih grupa o svom sajtu. ako nadjes nekoliko korisnika na svom sajtu koji su upisani na nasoj listi popularnih http:\/\/xat.com\/popular oni ce ti i pomoci da dovedes jos chatera!"}