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
        DB::table('predmet')->truncate();

        Predmet::create(['sifra'=>'63277','naziv'=>'Programiranje 1','opis'=>'Cilj predmeta je študentom predstaviti osnovne koncepte objektno usmerjenega programiranja v enem izmed splošno namenskih programskih jezikov 3. generacije in jih usposobiti za samostojen razvoj enostavnih računalniških programov.','id_nosilca'=>1,'KT'=>6]);
        Predmet::create(['sifra'=>'63202','naziv'=>'Osnove matematične analize','opis'=>'Matematična analiza je področje matematike, ki se ukvarja s funkcijami. Funkcija je formalen opis dejstva, da sta dve količini odvisni, in odvisnosti med njima.',
            'id_nosilca'=>2,'KT'=>6,'tip'=>'obvezni']);
        Predmet::create(['sifra'=>'63203','naziv'=>'Diskretne strukture','opis'=>'Z matematiko je križ. Diskretne strukture so matematika. Zato so z Diskretnimi strukturami tudi same sitnosti. Ah, šalo na stran. Predstavimo raje, kaj bi zamudili, če bi se Diskretnim strukturam izognili. Če vemo, da je 1+1=2 in 2+2=5, potem bi morali verjeti tudi, da je 3+3=7, mar ne? Sešteli bi lahko obe "enačbi", na primer. Toda v tem primeru moramo verjeti tudi, da so vse krave iste barve. Tega pa si najbrž ne bi mislili.','id_nosilca'=>3,'KT'=>6]);
        Predmet::create(['sifra'=>'63204','naziv'=>'Osnove digitalnih vezij','opis'=>'','id_nosilca'=>10,'KT'=>6]);
        Predmet::create(['sifra'=>'63205','naziv'=>'Fizika','opis'=>'','id_nosilca'=>11,'KT'=>6]);
        Predmet::create(['sifra'=>'63278','naziv'=>'Programiranje 2','opis'=>'','id_nosilca'=>12,'KT'=>6]);
        Predmet::create(['sifra'=>'63207','naziv'=>'Linearna algebra','opis'=>'','id_nosilca'=>13,'KT'=>6]);
        Predmet::create(['sifra'=>'63208','naziv'=>'Osnove podatkovnih baz','opis'=>'','id_nosilca'=>14,'KT'=>6]);
        Predmet::create(['sifra'=>'63209','naziv'=>'Računalniške komunikacije','opis'=>'','id_nosilca'=>15,'KT'=>6]);
        Predmet::create(['sifra'=>'63210','naziv'=>'Komunikacija človek računalnik','opis'=>'','id_nosilca'=>16,'KT'=>6]);

        Predmet::create(['sifra'=>'63279','naziv'=>'Algoritmi in podatkovne strukture 1','opis'=>'','id_nosilca'=>17,'KT'=>6]);
        Predmet::create(['sifra'=>'63212','naziv'=>'Arhitektura računalniških sistemov','opis'=>'','id_nosilca'=>18,'KT'=>6]);
        Predmet::create(['sifra'=>'63213','naziv'=>'Verjetnost in statistika', 'opis'=>'Cilj predmeta je študentom računalništva in informatike predstaviti osnovne verjetnosti in statistike.', 'id_nosilca'=>8, 'KT'=>6]);
        Predmet::create(['sifra'=>'63280','naziv'=>'Algoritmi in podatkovne strukture 2','opis'=>'','id_nosilca'=>19,'KT'=>6]);
        Predmet::create(['sifra'=>'63215','naziv'=>'Osnove informacijskih sistemov','opis'=>'','id_nosilca'=>20,'KT'=>6]);
        Predmet::create(['sifra'=>'63216','naziv'=>'Teorija informacij in sistemov','opis'=>'','id_nosilca'=>21,'KT'=>6]);
        Predmet::create(['sifra'=>'63217','naziv'=>'Operacijski sistemi','opis'=>'','id_nosilca'=>19,'KT'=>6]);
        Predmet::create(['sifra'=>'63218','naziv'=>'Organizacija računalniških sistemov','opis'=>'','id_nosilca'=>22,'KT'=>6]);
        Predmet::create(['sifra'=>'63219','naziv'=>'Matematično modeliranje','opis'=>'Cilj predmeta je nadgraditi osnovno poznavanje in razumevanje pojmov matematične analize in linearne algebre z zahtevnejšimi pojmi, prikazati njihovo uporabo pri matematičnem modeliranju pojavov v računalništvu in drugih znanostih in osnovne metode za računanje dobljenih modelov.','id_nosilca'=>2,'KT'=>6]);

        //3.letnik BUN-RI
        Predmet::create(['sifra'=>'63246','naziv'=>'Komuniciranje in vodenje projektov','opis'=>'Prvi cilj predmeta je osvežitev in nadgradnja osnovnih komunikacijskih kompetenc (pisno izražanje, govor, komuniciranje po medmrežju), predvsem v povezavi s poročanjem o strokovnih temah in z uporabo sodobnih informacijskih tehnologij. Drugi del predmeta študente seznani z osnovnimi načini organizacije projektnega načina dela.','id_nosilca'=>6,'KT'=>6]);
        Predmet::create(['sifra'=>'63248','naziv'=>'Ekonomika in podjetništvo','opis'=>'Temeljni namen predmeta je seznanitev študenta s področjem ekonomske znanosti na ravni združb (podjetij, zavodov itn.), zato da bo usposobljen dojemati vsebino tistih strokovnih pogovorov, ki vsebujejo ekonomske pojme, ter dejavno sodelovati v njih.','id_nosilca'=>7,'KT'=>6]);
        Predmet::create(['sifra'=>'63254','naziv'=>'Postopki razvoja programske opreme','opis'=>'Cilj predmeta je pridobiti znanja o postopkih razvoja programske opreme s posebnim poudarkom na razvoju strežniških (server-side, datacenter, cloud) aplikacij, torej aplikacij, ki se uporabljajo v velikih informacijskih sistemih podjetij ali velikih spletnih aplikacij (npr. Facebook, LinkedIn, spletnih trgovin kot so Amazon, mimovrste, ebay in podobnih).','id_nosilca'=>4,'KT'=>6]);
        Predmet::create(['sifra'=>'63255','naziv'=>'Spletno programiranje','opis'=>'Pri predmetu Spletno programiranje se bomo posvetili pregledu nad tehnologijami, ki se uporabljajo pri delovanju spleta, spletnih strežnikov, brskalnikov in spletnih aplikacij. Pregledali bomo osnove izdelave in oblikovanja spletnih strani (HTML5, CSS, XML) ter jih nadgradili s pregledom tehnologij na strani klienta (JavaScript) in strežnika (PHP, AJAX, JavaServer, ASP.NET, Ruby/Rails, spletne storitve).','id_nosilca'=>5,'KT'=>6]);
        Predmet::create(['sifra'=>'63256','naziv'=>'Tehnologije programske opreme','opis'=>'Predstavljajte si razvijalca programske opreme, od katerega naročnik želi, da izdela rešitev, ki mu bo (seveda s pomočjo računalnika) olajšala delo na določenem področju. Razvijalec mora najprej ugotoviti, kakšne so zahteve uporabnikov, na podlagi tega izdelati načrt rešitve, napisati potrebne programe, jih stestirati in predati v uporabo ter nato vzdrževati do konca njihove življenjske dobe.','id_nosilca'=>1,'KT'=>6]);
        Predmet::create(['sifra'=>'63269','naziv'=>'Računalniška grafika in tehnologija iger','opis'=>'','id_nosilca'=>24,'KT'=>6]);
        Predmet::create(['sifra'=>'63270','naziv'=>'Multimedijski sistemi','opis'=>'','id_nosilca'=>25,'KT'=>6]);
        Predmet::create(['sifra'=>'63271','naziv'=>'Osnove oblikovanja','opis'=>'','id_nosilca'=>26,'KT'=>6]);

        //1.letnik BMAG-RI
        Predmet::create(['sifra'=>'63508', 'naziv'=>'Algoritmi','opis'=>'Govorimo o algoritmih in podatkovnih strukturah. To so za računalnikarja orodja, s katerimi realizira svoje, še tako divje ideje.','id_nosilca'=>9,'KT'=>6]);
        Predmet::create(['sifra'=>'63506','naziv'=>'Matematika II','opis'=>'','id_nosilca'=>27,'KT'=>6]);
        Predmet::create(['sifra'=>'63507','naziv'=>'Programiranje','opis'=>'','id_nosilca'=>15,'KT'=>6]);
        Predmet::create(['sifra'=>'63509','naziv'=>'Računalniški sistemi','opis'=>'','id_nosilca'=>18,'KT'=>6]);

    }

}