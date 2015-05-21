<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:13
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Predmet;


class PredmetSeeder extends Seeder
{

    public function run()
    {
        //Predmete dodajaj na konec, drugače se podrejo podatki v povezovalnih tabelah!!!!!!!!!!!
        DB::table('predmet')->truncate();

        Predmet::create(['id'=>1,'sifra'=>'63277','naziv'=>'Programiranje 1','opis'=>'Cilj predmeta je študentom predstaviti osnovne koncepte objektno usmerjenega programiranja v enem izmed splošno namenskih programskih jezikov 3. generacije in jih usposobiti za samostojen razvoj enostavnih računalniških programov.','id_nosilca'=>1,'KT'=>6]);
        Predmet::create(['id'=>2,'sifra'=>'63202','naziv'=>'Osnove matematične analize','opis'=>'Matematična analiza je področje matematike, ki se ukvarja s funkcijami. Funkcija je formalen opis dejstva, da sta dve količini odvisni, in odvisnosti med njima.',
            'id_nosilca'=>2,'KT'=>6,'tip'=>'obvezni']);
        Predmet::create(['id'=>3,'sifra'=>'63203','naziv'=>'Diskretne strukture','opis'=>'Z matematiko je križ. Diskretne strukture so matematika. Zato so z Diskretnimi strukturami tudi same sitnosti. Ah, šalo na stran. Predstavimo raje, kaj bi zamudili, če bi se Diskretnim strukturam izognili. Če vemo, da je 1+1=2 in 2+2=5, potem bi morali verjeti tudi, da je 3+3=7, mar ne? Sešteli bi lahko obe "enačbi", na primer. Toda v tem primeru moramo verjeti tudi, da so vse krave iste barve. Tega pa si najbrž ne bi mislili.','id_nosilca'=>3,'KT'=>6]);
        Predmet::create(['id'=>4,'sifra'=>'63204','naziv'=>'Osnove digitalnih vezij','opis'=>'','id_nosilca'=>10,'KT'=>6]);
        Predmet::create(['id'=>5,'sifra'=>'63205','naziv'=>'Fizika','opis'=>'','id_nosilca'=>11,'KT'=>6]);
        Predmet::create(['id'=>6,'sifra'=>'63278','naziv'=>'Programiranje 2','opis'=>'','id_nosilca'=>12,'KT'=>6]);
        Predmet::create(['id'=>7,'sifra'=>'63207','naziv'=>'Linearna algebra','opis'=>'','id_nosilca'=>13,'KT'=>6]);
        Predmet::create(['id'=>8,'sifra'=>'63208','naziv'=>'Osnove podatkovnih baz','opis'=>'','id_nosilca'=>14,'KT'=>6]);
        Predmet::create(['id'=>9,'sifra'=>'63209','naziv'=>'Računalniške komunikacije','opis'=>'','id_nosilca'=>15,'KT'=>6]);
        Predmet::create(['id'=>10,'sifra'=>'63210','naziv'=>'Komunikacija človek računalnik','opis'=>'','id_nosilca'=>16,'KT'=>6]);

        Predmet::create(['id'=>11,'sifra'=>'63279','naziv'=>'Algoritmi in podatkovne strukture 1','opis'=>'','id_nosilca'=>17,'KT'=>6]);
        Predmet::create(['id'=>12,'sifra'=>'63212','naziv'=>'Arhitektura računalniških sistemov','opis'=>'','id_nosilca'=>18,'KT'=>6]);
        Predmet::create(['id'=>13,'sifra'=>'63213','naziv'=>'Verjetnost in statistika', 'opis'=>'Cilj predmeta je študentom računalništva in informatike predstaviti osnovne verjetnosti in statistike.', 'id_nosilca'=>8, 'KT'=>6]);
        Predmet::create(['id'=>14,'sifra'=>'63280','naziv'=>'Algoritmi in podatkovne strukture 2','opis'=>'','id_nosilca'=>19,'KT'=>6]);
        Predmet::create(['id'=>15,'sifra'=>'63215','naziv'=>'Osnove informacijskih sistemov','opis'=>'','id_nosilca'=>20,'KT'=>6]);
        Predmet::create(['id'=>16,'sifra'=>'63216','naziv'=>'Teorija informacij in sistemov','opis'=>'','id_nosilca'=>21,'KT'=>6]);
        Predmet::create(['id'=>17,'sifra'=>'63217','naziv'=>'Operacijski sistemi','opis'=>'','id_nosilca'=>19,'KT'=>6]);
        Predmet::create(['id'=>18,'sifra'=>'63218','naziv'=>'Organizacija računalniških sistemov','opis'=>'','id_nosilca'=>22,'KT'=>6]);
        Predmet::create(['id'=>19,'sifra'=>'63219','naziv'=>'Matematično modeliranje','opis'=>'Cilj predmeta je nadgraditi osnovno poznavanje in razumevanje pojmov matematične analize in linearne algebre z zahtevnejšimi pojmi, prikazati njihovo uporabo pri matematičnem modeliranju pojavov v računalništvu in drugih znanostih in osnovne metode za računanje dobljenih modelov.','id_nosilca'=>2,'KT'=>6]);

        //3.letnik BUN-RI
        Predmet::create(['id'=>20,'sifra'=>'63246','naziv'=>'Komuniciranje in vodenje projektov','opis'=>'Prvi cilj predmeta je osvežitev in nadgradnja osnovnih komunikacijskih kompetenc (pisno izražanje, govor, komuniciranje po medmrežju), predvsem v povezavi s poročanjem o strokovnih temah in z uporabo sodobnih informacijskih tehnologij. Drugi del predmeta študente seznani z osnovnimi načini organizacije projektnega načina dela.','id_nosilca'=>6,'KT'=>6]);
        Predmet::create(['id'=>21,'sifra'=>'63248','naziv'=>'Ekonomika in podjetništvo','opis'=>'Temeljni namen predmeta je seznanitev študenta s področjem ekonomske znanosti na ravni združb (podjetij, zavodov itn.), zato da bo usposobljen dojemati vsebino tistih strokovnih pogovorov, ki vsebujejo ekonomske pojme, ter dejavno sodelovati v njih.','id_nosilca'=>7, 'id_nosilca2' => 28, 'KT'=>6]);
        Predmet::create(['id'=>22,'sifra'=>'63254','naziv'=>'Postopki razvoja programske opreme','opis'=>'Cilj predmeta je pridobiti znanja o postopkih razvoja programske opreme s posebnim poudarkom na razvoju strežniških (server-side, datacenter, cloud) aplikacij, torej aplikacij, ki se uporabljajo v velikih informacijskih sistemih podjetij ali velikih spletnih aplikacij (npr. Facebook, LinkedIn, spletnih trgovin kot so Amazon, mimovrste, ebay in podobnih).','id_nosilca'=>4,'KT'=>6]);
        Predmet::create(['id'=>23,'sifra'=>'63255','naziv'=>'Spletno programiranje','opis'=>'Pri predmetu Spletno programiranje se bomo posvetili pregledu nad tehnologijami, ki se uporabljajo pri delovanju spleta, spletnih strežnikov, brskalnikov in spletnih aplikacij. Pregledali bomo osnove izdelave in oblikovanja spletnih strani (HTML5, CSS, XML) ter jih nadgradili s pregledom tehnologij na strani klienta (JavaScript) in strežnika (PHP, AJAX, JavaServer, ASP.NET, Ruby/Rails, spletne storitve).','id_nosilca'=>5,'KT'=>6]);
        Predmet::create(['id'=>24,'sifra'=>'63256','naziv'=>'Tehnologije programske opreme','opis'=>'Predstavljajte si razvijalca programske opreme, od katerega naročnik želi, da izdela rešitev, ki mu bo (seveda s pomočjo računalnika) olajšala delo na določenem področju. Razvijalec mora najprej ugotoviti, kakšne so zahteve uporabnikov, na podlagi tega izdelati načrt rešitve, napisati potrebne programe, jih stestirati in predati v uporabo ter nato vzdrževati do konca njihove življenjske dobe.','id_nosilca'=>1,'KT'=>6]);
        Predmet::create(['id'=>25,'sifra'=>'63269','naziv'=>'Računalniška grafika in tehnologija iger','opis'=>'','id_nosilca'=>24,'KT'=>6]);
        Predmet::create(['id'=>26,'sifra'=>'63270','naziv'=>'Multimedijski sistemi','opis'=>'','id_nosilca'=>25,'KT'=>6]);
        Predmet::create(['id'=>27,'sifra'=>'63271','naziv'=>'Osnove oblikovanja','opis'=>'','id_nosilca'=>26,'KT'=>6]);

        //1.letnik BMAG-RI
        Predmet::create(['id'=>28,'sifra'=>'63508', 'naziv'=>'Algoritmi','opis'=>'Govorimo o algoritmih in podatkovnih strukturah. To so za računalnikarja orodja, s katerimi realizira svoje, še tako divje ideje.','id_nosilca'=>9,'KT'=>6]);
        Predmet::create(['id'=>29,'sifra'=>'63506','naziv'=>'Matematika II','opis'=>'','id_nosilca'=>27,'KT'=>6]);
        Predmet::create(['id'=>30,'sifra'=>'63507','naziv'=>'Programiranje','opis'=>'','id_nosilca'=>15,'KT'=>6]);
        Predmet::create(['id'=>31,'sifra'=>'63509','naziv'=>'Računalniški sistemi','opis'=>'','id_nosilca'=>18,'KT'=>6]);

        //prosto izbirni
        Predmet::create(['id'=>32,'sifra'=>'63745', 'naziv'=>'Angleški jezik nivo A','opis'=>'izbirni','id_nosilca'=>29,'KT'=>3]);
        Predmet::create(['id'=>33,'sifra'=>'63746','naziv'=>'Angleški jezik nivo B','opis'=>'izbirni','id_nosilca'=>29,'KT'=>3]);
        Predmet::create(['id'=>34,'sifra'=>'63747','naziv'=>'Angleški jezik nivo C','opis'=>'izbirni','id_nosilca'=>29,'KT'=>3]);
        Predmet::create(['id'=>35,'sifra'=>'63750','naziv'=>'Športna vzgoja','opis'=>'izbirni','id_nosilca'=>30,'KT'=>3]);
        Predmet::create(['id'=>36,'sifra'=>'63751','naziv'=>'Ekonomika in organizacija informatike','opis'=>'izbirni','id_nosilca'=>6,'KT'=>6]);
        Predmet::create(['id'=>37,'sifra'=>'63752','naziv'=>'Izbrana poglavja iz računalništva in informatike (Houdini fx:osnove proceduralnega modeliranja)','opis'=>'izbirni','id_nosilca'=>31,'KT'=>6]);
        Predmet::create(['id'=>38,'sifra'=>'63749','naziv'=>'Izbrana poglavja iz računalništva in informatike (Upravljanje tehnoloških podjetij)','opis'=>'izbirni','id_nosilca'=>32,'KT'=>6]);
        Predmet::create(['id'=>39,'sifra'=>'63764','naziv'=>'Računalniška orodja, jeziki in okolja - TP B (Gradnja Oblakov z ogrodjem OpenStack)','opis'=>'izbirni','id_nosilca'=>33,'KT'=>3]);

        Predmet::create(['id'=>40,'sifra'=>'63260', 'naziv'=>'Digitalno načrtovanje','opis'=>'Študenta želimo naučiti za samostojno uporabo in načrtovanje digitalnih vezij z uporabo načrtovalskega orodja. Pri tem ga opozorimo na specifičnosti le-tega in naučimo upoštevati in izkoriščati le-te rešitve. Uvod v načrtovanje in testiranje digitalnih sistemov; Jeziki za opis strojne opreme (VHDL, Verilog, Abel, …);Tehnologija in pregled programabilnih vezij; Računalniška aritmetika in načrtovanje in sinteza odločitvenih vezij, modulske in dvonivojske realizacije;Načrtovanje sekvenčnih vezij: sinhrona in asinhrona vezja, pomnilne celice, register, registerski niz, števci, splošni končni avtomat, pomnilnik, …);Urin signal: sinteza, distribucija, »clock gating«;Načrtovanje (mikro)procesorja: podatkovne poti, kontrolna enota, vh/izh vmesniki; Modularna gradnja sistemov: sistem na čipu (SOC, System-on-Chip);','id_nosilca'=>22,'KT'=>6]);
        Predmet::create(['id'=>41,'sifra'=>'63261', 'naziv'=>'Porazdeljeni sistemi','opis'=>'Na izbranih primerih bomo spoznali pasti vzporednih in paralelnih sistemov, jih poskušali razumeti in zaobiti. Z znanji, ki jih boste pridobili pri predmetu, boste za izbrane aplikacije sposobni sami izbrati najprimernejšo strojno opremo in napisali dobre in učinkovite programe.','id_nosilca'=>21,'KT'=>6]);
        Predmet::create(['id'=>42,'sifra'=>'63262', 'naziv'=>'Zanesljivost in zmogljivost računalniških sistemov','opis'=>'Cilj predmeta je študentom računalništva in informatike predstaviti osnovne metode in pristope na področjih računalniške zanesljivosti in zmogljivosti. Obe sta ključni za uspešnost delovanja kakršnegakoli računalniškega sistema. Predmet naj bi študentom podal tako teoretične osnove in metode obeh področij, kot tudi skušal čimbolje predstaviti uporabo teoretičnih osnov in metod na konkretnih problemih načrtovanja in vzdževanja računalniških sistemov.','id_nosilca'=>34,'KT'=>6]);
        Predmet::create(['id'=>43,'sifra'=>'63515', 'naziv'=>'Sodobne metode razvoja programske opreme', 'opis'=>'', 'id_nosilca'=>1, 'KT'=>6]);

        //DIPLOMA
        Predmet::create(['id'=>44,'sifra'=>'11111', 'naziv'=>'Diplomsko delo', 'opis'=>'Za vse študente so pogoji za dokončanje študija opravljene vse obveznosti pri vpisanih predmetih v skupnem obsegu vsaj 174 kreditnih točk, v skladu s pravili pripravljeno in oddano diplomsko delo, ki je ocenjeno s 6 KT ter uspešno opravljen javni zagovor diplomskega dela.', 'id_nosilca'=>35, 'KT'=>6]);
        //Magisterij
        Predmet::create(['id'=>45,'sifra'=>'22222', 'naziv'=>'Magistrsko delo', 'opis'=>'Magistrsko delo je sestavni del celega drugega letnika vašega študija, ovrednoteno je s 24 kreditnimi točkami. To pomeni, da morate pripravam in izdelavi naloge nameniti približno 720 ur dela.', 'id_nosilca'=>35, 'KT'=>24]);

        Predmet::create(['id'=>46,'sifra'=>'63511', 'naziv'=>'Brezžična senzorska omrežja', 'opis'=>'', 'id_nosilca'=>10, 'KT'=>6]);
        Predmet::create(['id'=>47,'sifra'=>'63528', 'naziv'=>'Kriptografija in računalniška varnost', 'opis'=>'', 'id_nosilca'=>8, 'KT'=>6]);
        Predmet::create(['id'=>48,'sifra'=>'63532', 'naziv'=>'Diskretna matematika', 'opis'=>'', 'id_nosilca'=>3, 'KT'=>6]);
        Predmet::create(['id'=>49,'sifra'=>'63522', 'naziv'=>'Numerična matematika', 'opis'=>'', 'id_nosilca'=>13, 'KT'=>6]);
        Predmet::create(['id'=>50,'sifra'=>'63541', 'naziv'=>'Računalniške storitve v oblaku', 'opis'=>'', 'id_nosilca'=>4, 'KT'=>6]);
        Predmet::create(['id'=>51,'sifra'=>'63527', 'naziv'=>'Interaktivnost in oblikovanje informacij', 'opis'=>'', 'id_nosilca'=>6, 'KT'=>6]);
        Predmet::create(['id'=>52,'sifra'=>'63519', 'naziv'=>'Strojno učenje', 'opis'=>'', 'id_nosilca'=>17, 'KT'=>6]);

        Predmet::create(['id'=>53,'sifra'=>'63220', 'naziv'=>'Principi programskih jezikov', 'opis'=>'Pri tem predmetu bomo spoznali , da lahko programiramo tudi na druge načine, ne samo algoritmično. Na primer tako, da računalniku opišemo le, kaj je problem. Računalnik pa sam poišče postopek, ki privede do rešitve. To omogočajo deklarativni programski jeziki, ki temeljijo na uporabi logike ali omejitev. Programirati je možno celo kar s primeri. Računalniku na primer pokažemo nekaj primerov sortiranih seznamov, računalnik pa sam sestavi program za sortiranje. Obstajajo še druge paradigme programiranja, ki vodijo do korenito drugačnih načinov razmišljanja o programih, kot smo vajeni.', 'id_nosilca'=>17, 'KT'=>6]);
        Predmet::create(['id'=>54,'sifra'=>'63221', 'naziv'=>'Računalniške tehnologije', 'opis'=>'Cilj predmeta Računalniške tehnologije je študentom računalništva in informatike predstaviti fizikalne in tehnološke temelje delovanja in izdelave računalnikov, kvantitativno obravnavo nekaterih relevantnih  primerov s področja fizike trdne snovi in predstavitev uporabe fizikalnih zakonitosti v tehniki izdelave mikroelektronskih, monolitnih vezij, temeljnih gradnikov računalnikov. Eden od ciljev predmeta je tudi predstavitev osnov kvantne mehanike, ki že sama po sebi postaja v računalništvu vse pomembnejša fizikalne teorija.', 'id_nosilca'=>12, 'KT'=>6]);

        Predmet::create(['id'=>55,'sifra'=>'63206', 'naziv'=>'Programiranje in algoritmi', 'opis'=>'', 'KT'=>6]);
    }

}