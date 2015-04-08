<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\StudijskiProgram;
use App\Models\Nosilec;
use App\Models\Predmet;
use App\Models\Modul;
use App\Models\StudentPredmet;
use App\Models\Referent;
use App\Models\ProgramLetnik;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->call('TableSeeder');
		Model::unguard();

	}



}

class TableSeeder extends Seeder {

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student')->truncate();


        Student::create(['vpisna' => '63120340', 'ime' => 'Neza', 'priimek' => 'Belej', 'email' => 'nezabelej@gmail.com','geslo' => \Hash::make('nezabelej'), 'emso' => '0812992505123', 'davcna' => '12345678', 'spol' => 'ženski', 'naslov' => 'Brstnik 4', 'obcina' => 'Laško', 'posta' => '3270', 'drzava' => 'Slovenija', 'datum_rojstva'=>'1992-12-08', 'obcina_rojstva' => 'Trbovlje', 'drzava_rojstva' => 'Slovenija', 'drzavljanstvo' => 'slovensko', 'telefon' => '031683852']);
        Student::create(['vpisna' => '63120136', 'ime' => 'Veronika', 'priimek' => 'Blažič', 'email' => 'veronikablazic@gmail.com','geslo' => \Hash::make('veronikablazic'), 'emso' => '2309993505223', 'posta' => '5000', 'datum_rojstva' => '1993-09-23', 'obcina_rojstva' => 'Nova Gorica']);
        Student::create(['vpisna' => '63130385', 'ime' => 'Nejc', 'priimek' => 'Bizjak', 'email' => 'neco.bizjak@gmail.com','geslo' => \Hash::make('nejcbizjak'), 'emso' => '1307991500333', 'posta' => '5272', 'datum_rojstva' => '1991-07-13', 'obcina_rojstva' => 'Nova Gorica']);
        Student::create(['ime' => 'Janez', 'priimek' => 'Novak', 'email' => 'janeznovak@gmail.com', 'geslo' =>\Hash::make('janeznovak') ]);
        Student::create(['vpisna' => '63150000', 'ime' => 'Miha', 'priimek' => 'Vesel', 'email' => 'mihavesel@gmail.com','geslo' => \Hash::make('mihavesel'), 'emso' => '2207994500234', 'posta' => '3000', 'datum_rojstva' => '1994-07-22', 'obcina_rojstva' => 'Celje']);
        Student::create(['vpisna' => '63150001', 'ime' => 'Samo', 'priimek' => 'Veter', 'email' => 'samoveter@gmail.com','geslo' => \Hash::make('samoveter'), 'emso' => '0707994500334', 'posta' => '1000', 'datum_rojstva' => '1994-07-07', 'obcina_rojstva' => 'Ljubljana']);



        DB::table('studijski_program')->truncate();
        $prog1 = StudijskiProgram::create(['ime'=>'Univerzitetni program Računalništvo in informatika','oznaka'=>'BUN-RI','opis'=>
            'Študij računalništva in informatike na Fakulteti za računalništvo in informatiko Univerze v Ljubljani je študij z najdaljšo tradicijo na tem področju v Sloveniji. Študentom ponuja temeljna in praktična znanja, ki so potrebna za delo v stroki, v skladu z najsodobnejšimi merili in standardi, ki za tovrstno izobraževanje veljajo v svetu. Zaradi izbirnosti v programu naši diplomanti niso strogo usmerjeni le v stroko, temveč so široko razgledani in visoko usposobljeni strokovnjaki.',

            'stopnja'=>1, 'kraj_izvajanja' => 'Ljubljana', 'trajanje_leta'=>3, 'stevilo_semestrov'=>6, 'KT'=>180, 'klasius_srv'=>16204]);
        StudijskiProgram::create(['ime'=>'Visokošolski program Računalništvo in informatika','oznaka'=>'BVS-RI','opis'=>
            'Tako kot drugi prvostopenjski študiji tudi Visokošolski strokovni študij traja tri leta. Prvi letnik je sestavljen iz nabora obveznih predmetov, ki študentom dajejo osnovna matematična, teoretična in strokovna znanja. V drugem in tretjem letniku se študenti z izbiranjem predmetov usmerijo v zaželene strokovne profile. Nabor predmetov pri posameznem profilu je določen z odvisnostmi med predmeti, ki nakazujejo poti oz. znanja, ki jih mora študent osvojiti. Ti predmeti predstavljajo različna področja računalništva (spletne tehnologije, programska oprema, strojna oprema, informacijski sistemi...) in študenta vodijo, da med študijem izbere dve različni področji računalništva, to je, dve ožji strokovni področji, ki ga najbolj zanimata.',
            'stopnja'=>1, 'trajanje_leta'=>3, 'stevilo_semestrov'=>6, 'KT'=>180, 'klasius_srv'=>16203]);
        StudijskiProgram::create(['ime'=>'Magistrski študijski program druge stopnje Računalništvo in informatika','oznaka'=>'BMAG-RI','opis'=>
            'Magistrski študijski program druge stopnje Računalništvo in informatika daje bodočim magistrom znanje in spretnosti, da bodo sposobni slediti razvoju in tehnološkim spremembam ter se vključiti v razvojno in znanstveno delo, ki nudi izjemne možnosti za zaposlitev v Sloveniji in po svetu.
            Predmetnik omogoča oblikovanje študija glede na lastne želje, motivacijo in nagnjenja. Izbirne vsebine pokrivajo široko paleto področij in tehnologij ter tako dovoljujejo različne strokovne specializacije.',
            'stopnja'=>2, 'trajanje_leta'=>2, 'stevilo_semestrov'=>4, 'KT'=>120, 'klasius_srv'=>17003]);

        DB::table('program_letnik')->truncate();
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>1, 'KT'=>60,'stevilo_obveznih_predmetov'=>10, 'stevilo_strokovnih_predmetov'=>0,'stevilo_prostih_predmetov'=>0, 'stevilo_modulov'=>0]);
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>2 ,'KT'=>60,'stevilo_obveznih_predmetov'=>8, 'stevilo_strokovnih_predmetov'=>1,'stevilo_prostih_predmetov'=>1, 'stevilo_modulov'=>0]);
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>3, 'KT'=>60,'stevilo_obveznih_predmetov'=>3, 'stevilo_strokovnih_predmetov'=>0,'stevilo_prostih_predmetov'=>1, 'stevilo_modulov'=>2]);
        ProgramLetnik::create(['id_programa'=>3, 'letnik'=>1, 'KT'=>60,'stevilo_obveznih_predmetov'=>4, 'stevilo_strokovnih_predmetov'=>5,'stevilo_prostih_predmetov'=>2, 'stevilo_modulov'=>0]);
        ProgramLetnik::create(['id_programa'=>3, 'letnik'=>2, 'KT'=>60,'stevilo_obveznih_predmetov'=>1, 'stevilo_strokovnih_predmetov'=>6,'stevilo_prostih_predmetov'=>0, 'stevilo_modulov'=>0]);

        DB::table('nosilec')->truncate();
        Nosilec::create(['id'=>1,'ime'=>'Viljan' ,'priimek'=>'Mahnič', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>'', 'email'=>'viljan.mahnic@fri.uni-lj.si']);
        Nosilec::create(['id'=>2,'ime'=>'Neža' ,'priimek'=>'Mramor Kosta', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>'', 'email'=>'neza.mramor@fri.uni-lj.si']);
        Nosilec::create(['id'=>3,'ime'=>'Gašper' ,'priimek'=>'Fijavž', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>'', 'email'=>'gasper.fijavz@fri.uni-lj.si']);
        Nosilec::create(['id'=>4,'ime'=>'Matjaž' ,'priimek'=>'Branko Jurič', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>'', 'email'=>'mazjaz.juric@fri.uni-lj.si']);
        Nosilec::create(['id'=>5,'ime'=>'Aleš' ,'priimek'=>'Smrdel', 'naziv'=>'doc. dr.' , 'vloga'=>'' , 'geslo'=>'', 'email'=>'ales.smrdel@fri.uni-lj.si']);
        Nosilec::create(['id'=>6,'ime'=>'Franc' ,'priimek'=>'Solina', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>'', 'email'=>'franc.solina@fri.uni-lj.si']);
        Nosilec::create(['id'=>7,'ime'=>'Mateja' ,'priimek'=>'Drnovšek', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>'', 'email'=>'mateja.drnovsek@fri.uni-lj.si']);

        DB::table('student_predmet')->truncate();
        StudentPredmet::create(['id'=>1, 'id_studenta'=>1, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id'=>2, 'id_studenta'=>2, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id'=>3, 'id_studenta'=>1, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        DB::table('modul')->truncate();
        $modul1 = Modul::create(['ime'=>'Razvoj programske opreme','opis'=>'']);

        DB::table('predmet')->truncate();
        Predmet::create(['naziv'=>'Programiranje 1','opis'=>'Cilj predmeta je študentom predstaviti osnovne koncepte objektno usmerjenega programiranja v enem izmed splošno namenskih programskih jezikov 3. generacije in jih usposobiti za samostojen razvoj enostavnih računalniških programov.','id_nosilca'=>1,'KT'=>6]);
        Predmet::create(['naziv'=>'Osnove matematične analize','opis'=>'Matematična analiza je področje matematike, ki se ukvarja s funkcijami. Funkcija je formalen opis dejstva, da sta dve količini odvisni, in odvisnosti med njima (na primer, dolžina dneva je odvisna od letnega časa, račun pri blagajni je odvisen od tega, kaj je v košarici, uspeh na izpitu od časa, vloženega v učenje, primerov je še in še). Pri tem predmetu vas želimo bolje spoznati s funkcijami. Zakaj? No, zato, ker jih boste potrebovali pri drugih, računalniških predmetih in kasneje pri svojem delu v računalništvu in informatiki. Več, ko boste o njih vedeli, bolj si boste lahko z njimi pomagali in možnosti so tu skoraj neizčrpne.',
            'id_nosilca'=>2,'KT'=>6,'tip'=>'obvezni']);
        Predmet::create(['naziv'=>'Diskretne strukture','opis'=>'Z matematiko je križ. Diskretne strukture so matematika. Zato so z Diskretnimi strukturami tudi same sitnosti. Ah, šalo na stran. Predstavimo raje, kaj bi zamudili, če bi se Diskretnim strukturam izognili. Če vemo, da je 1+1=2 in 2+2=5, potem bi morali verjeti tudi, da je 3+3=7, mar ne? Sešteli bi lahko obe "enačbi", na primer. Toda v tem primeru moramo verjeti tudi, da so vse krave iste barve. Tega pa si najbrž ne bi mislili.','id_nosilca'=>3,'KT'=>6]);
        Predmet::create(['naziv'=>'Matematično modeliranje','opis'=>'Cilj predmeta je nadgraditi osnovno poznavanje in razumevanje pojmov matematične analize in linearne algebre z zahtevnejšimi pojmi, prikazati njihovo uporabo pri matematičnem modeliranju pojavov v računalništvu in drugih znanostih in osnovne metode za računanje dobljenih modelov.','id_nosilca'=>2,'KT'=>6,'tip'=>'strokovni-izbirni']);
        Predmet::create(['naziv'=>'Postopki razvoja programske opreme','opis'=>'Cilj predmeta je pridobiti znanja o postopkih razvoja programske opreme s posebnim poudarkom na razvoju strežniških (server-side, datacenter, cloud) aplikacij, torej aplikacij, ki se uporabljajo v velikih informacijskih sistemih podjetij ali velikih spletnih aplikacij (npr. Facebook, LinkedIn, spletnih trgovin kot so Amazon, mimovrste, ebay in podobnih).','id_nosilca'=>4,'KT'=>6,'id_modula'=>1]);
        Predmet::create(['naziv'=>'Spletno programiranje','opis'=>'Pri predmetu Spletno programiranje se bomo posvetili pregledu nad tehnologijami, ki se uporabljajo pri delovanju spleta, spletnih strežnikov, brskalnikov in spletnih aplikacij. Pregledali bomo osnove izdelave in oblikovanja spletnih strani (HTML5, CSS, XML) ter jih nadgradili s pregledom tehnologij na strani klienta (JavaScript) in strežnika (PHP, AJAX, JavaServer, ASP.NET, Ruby/Rails, spletne storitve).','id_nosilca'=>5,'KT'=>6,'id_modula'=>1]);
        Predmet::create(['naziv'=>'Tehnologije programske opreme','opis'=>'Predstavljajte si razvijalca programske opreme, od katerega naročnik želi, da izdela rešitev, ki mu bo (seveda s pomočjo računalnika) olajšala delo na določenem področju. Razvijalec mora najprej ugotoviti, kakšne so zahteve uporabnikov, na podlagi tega izdelati načrt rešitve, napisati potrebne programe, jih stestirati in predati v uporabo ter nato vzdrževati do konca njihove življenjske dobe. Pri predmetu Tehnologija programske opreme se boste naučili, kako to narediti z uporabo najnovejših pristopov k razvoju programske opreme.','id_nosilca'=>1,'KT'=>6,'id_modula'=>1]);
        Predmet::create(['naziv'=>'Komuniciranje in vodenje projektov','opis'=>'Prvi cilj predmeta je osvežitev in nadgradnja osnovnih komunikacijskih kompetenc (pisno izražanje, govor, komuniciranje po medmrežju), predvsem v povezavi s poročanjem o strokovnih temah in z uporabo sodobnih informacijskih tehnologij. Drugi del predmeta študente seznani z osnovnimi načini organizacije projektnega načina dela.','id_nosilca'=>6,'KT'=>6]);
        Predmet::create(['naziv'=>'Ekonomika in podjetništvo','opis'=>'Temeljni namen predmeta je seznanitev študenta s področjem ekonomske znanosti na ravni združb (podjetij, zavodov itn.), zato da bo usposobljen dojemati vsebino tistih strokovnih pogovorov, ki vsebujejo ekonomske pojme, ter dejavno sodelovati v njih. Iz tega namena izvedeni cilji so zagotoviti tako poznavanje temeljnih ekonomskih pojmov in njihove medsebojne odvisnosti kot tudi sposobnost vključevanja teh pojmov v razmere praktičnega dela, zlasti v zvezi z ustanavljanjem in delovanjem podjetij v lasti gospodarskih družb, ko se bo kot diplomant soočil s potrebo ovrednotenja določenih stanj, procesov in izidov.','id_nosilca'=>7,'KT'=>6]);

        DB::table('program_modul')->truncate();
        DB::table('program_modul')->insert(['id_programa'=>1, 'id_modula'=>1, 'letnik'=>1, 'studijsko_leto'=>'2014/2015']);

        DB::table('program_predmet')->truncate();
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>1,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>2,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>3,'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>4,'letnik'=>1, 'semester'=>2,'tip'=>'strokovno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>8,'letnik'=>3, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>9,'letnik'=>3, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);


        DB::table('student_program')->truncate();

        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1]);
        DB::table('student_program')->insert(['id_studenta'=>3, 'id_programa'=>3, 'vrsta_vpisa'=>2, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-26', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>1]);
        DB::table('student_program')->insert(['id_studenta'=>1, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-25', 'datum_vpisa'=>'2014-09-25', 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>1, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>null, 'vloga_potrjena'=>null, 'datum_vpisa'=>null, 'studijsko_leto'=>'2015/2016', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>2, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2015-04-01', 'vloga_potrjena'=>null, 'datum_vpisa'=>null, 'studijsko_leto'=>'2015/2016', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1]);

        DB::table('referent')->truncate();
        Referent::create(['email'=>'zdenka.velikonja@fri.uni-lj.si', 'geslo'=>Hash::make('zdenkavelikonja'), 'ime'=>'Zdenka','priimek'=>'Velikonja']);
        Referent::create(['email'=>'metka.runovc@fri.uni-lj.si', 'geslo'=>Hash::make('metkarunovc'), 'ime'=>'Metka','priimek'=>'Runovc']);

        DB::table('vrsta_vpisa')->truncate();
        DB::table('vrsta_vpisa')->insert(['sifra'=>1, 'ime'=>'Prvi vpis v letnik/dodatno leto', 'mozni_letniki'=>'Vsi letniki in dodatno leto.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>2, 'ime'=>'Ponavljanje letnika', 'mozni_letniki'=>'V zadnjem letniku in v dodatnem letu ponavljanje ni več možno.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>3, 'ime'=>'Nadaljevanje letnika', 'mozni_letniki'=>'Vpis ni več dovoljen.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>4, 'ime'=>'Podaljsanje statusa študenta', 'mozni_letniki'=>'Vsi letniki, dodatno leto.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>5, 'ime'=>'Nadaljevanje letnika', 'mozni_letniki'=>'Vpis ni več dovoljen.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>8, 'ime'=>'Vpis v semester skupnega štuudijskega programa', 'mozni_letniki'=>'Vsi letniki, samo za skupne študijske programe.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>7, 'ime'=>'Vpis po merilih za prehode v višji letnik', 'mozni_letniki'=>'Vsi letniki razen prvega, dodatno leto ni dovoljeno.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>98, 'ime'=>'Vpis za zaključek', 'mozni_letniki'=>'Zadnji letnik. Namenjeno samo strokovnim delavcem v študentskem referatu.']);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
