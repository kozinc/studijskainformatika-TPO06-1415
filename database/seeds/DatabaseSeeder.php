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
use App\Models\Sklep;


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


        Student::create(['vpisna' => '63120340', 'ime' => 'Neza', 'priimek' => 'Belej', 'email' => 'nezabelej@gmail.com','geslo' => \Hash::make('nezabelej'), 'emso' => '0812992505123', 'davcna' => '12345678', 'spol' => 'ženski','naslovPosta' => 'Brstnik 4', 'obcinaPosta' => 'Laško', 'postaPosta' => '3270', 'drzavaPosta' => 'Slovenija' ,'naslov' => 'Brstnik 4', 'obcina' => 'Laško', 'posta' => '3270', 'drzava' => 'Slovenija', 'datum_rojstva'=>'1992-12-08', 'obcina_rojstva' => 'Trbovlje', 'drzava_rojstva' => 'Slovenija', 'drzavljanstvo' => 'slovensko', 'telefon' => '031683852']);
        Student::create(['vpisna' => '63120136', 'ime' => 'Veronika', 'priimek' => 'Blažič', 'email' => 'veronikablazic@gmail.com','geslo' => \Hash::make('veronikablazic'), 'emso' => '2309993505223', 'posta' => '5000', 'datum_rojstva' => '1993-09-23', 'obcina_rojstva' => 'Nova Gorica']);
        Student::create(['vpisna' => '63130385', 'ime' => 'Nejc', 'priimek' => 'Bizjak', 'email' => 'neco.bizjak@gmail.com','geslo' => \Hash::make('nejcbizjak'), 'emso' => '1307991500333', 'posta' => '5272', 'datum_rojstva' => '1991-07-13', 'obcina_rojstva' => 'Nova Gorica']);
        Student::create(['vpisna'=>'63120111', 'ime' => 'Janez', 'priimek' => 'Novak', 'email' => 'janeznovak@gmail.com', 'geslo' =>\Hash::make('janeznovak') ]);
        Student::create(['vpisna' => '63150000', 'ime' => 'Miha', 'priimek' => 'Vesel', 'email' => 'mihavesel@gmail.com','geslo' => \Hash::make('mihavesel'), 'emso' => '2207994500234', 'posta' => '3000', 'datum_rojstva' => '1994-07-22', 'obcina_rojstva' => 'Celje']);
        Student::create(['vpisna' => '63150001', 'ime' => 'Samo', 'priimek' => 'Veter', 'email' => 'samoveter@gmail.com','geslo' => \Hash::make('samoveter'), 'emso' => '0707994500334', 'posta' => '1000', 'datum_rojstva' => '1994-07-07', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['ime' => 'Luka', 'priimek' => 'Mustaš', 'email' => 'lukamustas@gmail.com','geslo' => \Hash::make('lukamustas'), 'emso' => '2006995500434', 'posta' => '1000', 'datum_rojstva' => '1995-06-20', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63150002', 'ime' => 'Janez', 'priimek' => 'Mustaš', 'email' => 'janezmustas@gmail.com','geslo' => \Hash::make('janezmustas'), 'emso' => '0806994500434', 'posta' => '1000', 'datum_rojstva' => '1994-06-08', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63150003', 'ime' => 'Marko', 'priimek' => 'Petač', 'email' => 'markopetac@gmail.com','geslo' => \Hash::make('markopetac'), 'emso' => '0806994500534', 'posta' => '1000', 'datum_rojstva' => '1994-06-08', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63150004', 'ime' => 'Ivanka', 'priimek' => 'Uhan', 'email' => 'ivankauhan@gmail.com','geslo' => \Hash::make('ivankauhan'), 'emso' => '0101994505535', 'posta' => '1000', 'datum_rojstva' => '1994-01-01', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63140014', 'ime' => 'Jagoda', 'priimek' => 'Lipoglavšek', 'email' => 'jagodalipoglavsek@gmail.com','geslo' => \Hash::make('ivankauhan'), 'emso' => '0101993505535', 'posta' => '1000', 'datum_rojstva' => '1993-01-01', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63140015', 'ime' => 'Gregor', 'priimek' => 'Ivanec', 'email' => 'gregorivanec@gmail.com','geslo' => \Hash::make('gregorivanec'), 'emso' => '0110993500559', 'posta' => '1000', 'datum_rojstva' => '1993-10-01', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63140016', 'ime' => 'Jurij', 'priimek' => 'Opeka', 'email' => 'jurijopeka@gmail.com','geslo' => \Hash::make('jurijopeka'), 'emso' => '0110993500537', 'posta' => '1000', 'datum_rojstva' => '1993-10-01', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63140017', 'ime' => 'Nikolaj', 'priimek' => 'Mulec', 'email' => 'nikolajmulec@gmail.com','geslo' => \Hash::make('nikolajmulec'), 'emso' => '1911993505935', 'posta' => '1000', 'datum_rojstva' => '1993-11-19', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63130007', 'ime' => 'Arnold', 'priimek' => 'Schwartzeneger', 'email' => 'arnoldschwartzeneger@gmail.com','geslo' => \Hash::make('arnoldschwartzeneger'), 'emso' => '1901993505935', 'posta' => '1000', 'datum_rojstva' => '1992-01-19', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63130008', 'ime' => 'Evelyn', 'priimek' => 'Borin', 'email' => 'evelynborin@gmail.com','geslo' => \Hash::make('evelynborin'), 'emso' => '1902993505935', 'posta' => '1000', 'datum_rojstva' => '1992-02-19', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63130009', 'ime' => 'Miha', 'priimek' => 'Dlan', 'email' => 'mihadlan@gmail.com','geslo' => \Hash::make('mihadlan'), 'emso' => '1903993505935', 'posta' => '1000', 'datum_rojstva' => '1992-03-19', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63130010', 'ime' => 'Rok', 'priimek' => 'Pogorelec', 'email' => 'rokpogorelec@gmail.com','geslo' => \Hash::make('rokpogorelec'), 'emso' => '1904993505935', 'posta' => '1000', 'datum_rojstva' => '1992-04-19', 'obcina_rojstva' => 'Ljubljana']);
        Student::create(['vpisna' => '63120012', 'ime' => 'Štefan', 'priimek' => 'Zimic', 'email' => 'stefanzimic@gmail.com','geslo' => \Hash::make('stefanzimic'), 'emso' => '1905993505935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana']);


        DB::table('studijski_program')->truncate();
        $prog1 = StudijskiProgram::create(['ime'=>'Univerzitetni program Računalništvo in informatika','oznaka'=>'BUN-RI','opis'=>
            'Študij računalništva in informatike na Fakulteti za računalništvo in informatiko Univerze v Ljubljani je študij z najdaljšo tradicijo na tem področju v Sloveniji. Študentom ponuja temeljna in praktična znanja, ki so potrebna za delo v stroki, v skladu z najsodobnejšimi merili in standardi, ki za tovrstno izobraževanje veljajo v svetu. Zaradi izbirnosti v programu naši diplomanti niso strogo usmerjeni le v stroko, temveč so široko razgledani in visoko usposobljeni strokovnjaki.',

            'stopnja'=>1, 'kraj_izvajanja' => 'Ljubljana', 'trajanje_leta'=>3, 'stevilo_semestrov'=>6, 'KT'=>180, 'klasius_srv'=>16204]);
        StudijskiProgram::create(['ime'=>'Visokošolski program Računalništvo in informatika','oznaka'=>'BVS-RI','opis'=>
            'Tako kot drugi prvostopenjski študiji tudi Visokošolski strokovni študij traja tri leta. Prvi letnik je sestavljen iz nabora obveznih predmetov, ki študentom dajejo osnovna matematična, teoretična in strokovna znanja. V drugem in tretjem letniku se študenti z izbiranjem predmetov usmerijo v zaželene strokovne profile. Nabor predmetov pri posameznem profilu je določen z odvisnostmi med predmeti, ki nakazujejo poti oz. znanja, ki jih mora študent osvojiti. Ti predmeti predstavljajo različna področja računalništva (spletne tehnologije, programska oprema, strojna oprema, informacijski sistemi...) in študenta vodijo, da med študijem izbere dve različni področji računalništva, to je, dve ožji strokovni področji, ki ga najbolj zanimata.',
            'stopnja'=>1, 'trajanje_leta'=>3, 'kraj_izvajanja' => 'Ljubljana', 'stevilo_semestrov'=>6, 'KT'=>180, 'klasius_srv'=>16203]);
        StudijskiProgram::create(['ime'=>'Magistrski študijski program druge stopnje Računalništvo in informatika','oznaka'=>'BMAG-RI','opis'=>
            'Magistrski študijski program druge stopnje Računalništvo in informatika daje bodočim magistrom znanje in spretnosti, da bodo sposobni slediti razvoju in tehnološkim spremembam ter se vključiti v razvojno in znanstveno delo, ki nudi izjemne možnosti za zaposlitev v Sloveniji in po svetu.
            Predmetnik omogoča oblikovanje študija glede na lastne želje, motivacijo in nagnjenja. Izbirne vsebine pokrivajo široko paleto področij in tehnologij ter tako dovoljujejo različne strokovne specializacije.',
            'stopnja'=>2, 'trajanje_leta'=>2, 'kraj_izvajanja' => 'Ljubljana', 'stevilo_semestrov'=>4, 'KT'=>120, 'klasius_srv'=>17003]);

        DB::table('program_letnik')->truncate();
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>1, 'KT'=>60,'stevilo_obveznih_predmetov'=>10, 'stevilo_strokovnih_predmetov'=>0,'stevilo_prostih_predmetov'=>0, 'stevilo_modulov'=>0]);
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>2 ,'KT'=>60,'stevilo_obveznih_predmetov'=>8, 'stevilo_strokovnih_predmetov'=>1,'stevilo_prostih_predmetov'=>1, 'stevilo_modulov'=>0]);
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>3, 'KT'=>60,'stevilo_obveznih_predmetov'=>3, 'stevilo_strokovnih_predmetov'=>0,'stevilo_prostih_predmetov'=>1, 'stevilo_modulov'=>2]);
        ProgramLetnik::create(['id_programa'=>3, 'letnik'=>1, 'KT'=>60,'stevilo_obveznih_predmetov'=>4, 'stevilo_strokovnih_predmetov'=>5,'stevilo_prostih_predmetov'=>2, 'stevilo_modulov'=>0]);
        ProgramLetnik::create(['id_programa'=>3, 'letnik'=>2, 'KT'=>60,'stevilo_obveznih_predmetov'=>1, 'stevilo_strokovnih_predmetov'=>6,'stevilo_prostih_predmetov'=>0, 'stevilo_modulov'=>0]);

        DB::table('nosilec')->truncate();
        Nosilec::create(['id'=>1,'ime'=>'Viljan' ,'priimek'=>'Mahnič', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('viljanmahnic'), 'email'=>'viljan.mahnic@fri.uni-lj.si']);
        Nosilec::create(['id'=>2,'ime'=>'Neža' ,'priimek'=>'Mramor Kosta', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('nezamramorkosta'), 'email'=>'neza.mramor@fri.uni-lj.si']);
        Nosilec::create(['id'=>3,'ime'=>'Gašper' ,'priimek'=>'Fijavž', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('gasperfijavz'), 'email'=>'gasper.fijavz@fri.uni-lj.si']);
        Nosilec::create(['id'=>4,'ime'=>'Matjaž' ,'priimek'=>'Branko Jurič', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('matjazbrankojuric'), 'email'=>'mazjaz.juric@fri.uni-lj.si']);
        Nosilec::create(['id'=>5,'ime'=>'Aleš' ,'priimek'=>'Smrdel', 'naziv'=>'doc. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('alessmrdel'), 'email'=>'ales.smrdel@fri.uni-lj.si']);
        Nosilec::create(['id'=>6,'ime'=>'Franc' ,'priimek'=>'Solina', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('francsolina'), 'email'=>'franc.solina@fri.uni-lj.si']);
        Nosilec::create(['id'=>7,'ime'=>'Mateja' ,'priimek'=>'Drnovšek', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('matejadrnovsek'), 'email'=>'mateja.drnovsek@fri.uni-lj.si']);
        Nosilec::create(['id'=>8,'ime'=>'Aleksandar' ,'priimek'=>'Jurišić', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('aleksandarjurisic'), 'email'=>'aleksandar.jurisic@fri.uni-lj.si']);
        Nosilec::create(['id'=>9,'ime'=>'Marko' ,'priimek'=>'Robnik Šikonja', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('markorobniksikonja'), 'email'=>'marko.robniksikonja@fri.uni-lj.si']);


        DB::table('student_predmet')->truncate();
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>6]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>8, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>9, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>10, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>11, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2015/2016']);

        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>2, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>5, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>6, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>5, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>6, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create([ 'id_studenta'=>8, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>10, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>8, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>10, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>11, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>11, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>12, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>13, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>14, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>15, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>18, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>19, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>15, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>18, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>19, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);


        DB::table('modul')->truncate();
        $modul1 = Modul::create(['ime'=>'Razvoj programske opreme','opis'=>'']);

        DB::table('predmet')->truncate();
        Predmet::create(['sifra'=>'63277','naziv'=>'Programiranje 1','opis'=>'Cilj predmeta je študentom predstaviti osnovne koncepte objektno usmerjenega programiranja v enem izmed splošno namenskih programskih jezikov 3. generacije in jih usposobiti za samostojen razvoj enostavnih računalniških programov.','id_nosilca'=>1,'KT'=>6]);
        Predmet::create(['sifra'=>'63202','naziv'=>'Osnove matematične analize','opis'=>'Matematična analiza je področje matematike, ki se ukvarja s funkcijami. Funkcija je formalen opis dejstva, da sta dve količini odvisni, in odvisnosti med njima (na primer, dolžina dneva je odvisna od letnega časa, račun pri blagajni je odvisen od tega, kaj je v košarici, uspeh na izpitu od časa, vloženega v učenje, primerov je še in še). Pri tem predmetu vas želimo bolje spoznati s funkcijami. Zakaj? No, zato, ker jih boste potrebovali pri drugih, računalniških predmetih in kasneje pri svojem delu v računalništvu in informatiki. Več, ko boste o njih vedeli, bolj si boste lahko z njimi pomagali in možnosti so tu skoraj neizčrpne.',
            'id_nosilca'=>2,'KT'=>6,'tip'=>'obvezni']);
        Predmet::create(['sifra'=>'63203','naziv'=>'Diskretne strukture','opis'=>'Z matematiko je križ. Diskretne strukture so matematika. Zato so z Diskretnimi strukturami tudi same sitnosti. Ah, šalo na stran. Predstavimo raje, kaj bi zamudili, če bi se Diskretnim strukturam izognili. Če vemo, da je 1+1=2 in 2+2=5, potem bi morali verjeti tudi, da je 3+3=7, mar ne? Sešteli bi lahko obe "enačbi", na primer. Toda v tem primeru moramo verjeti tudi, da so vse krave iste barve. Tega pa si najbrž ne bi mislili.','id_nosilca'=>3,'KT'=>6]);

        Predmet::create(['sifra'=>'63213','naziv'=>'Verjetnost in statistika', 'opis'=>'Cilj predmeta je študentom računalništva in informatike predstaviti osnovne verjetnosti in statistike.', 'id_nosilca'=>8, 'KT'=>6, 'tip'=>'obvezni']);
        Predmet::create(['sifra'=>'63219','naziv'=>'Matematično modeliranje','opis'=>'Cilj predmeta je nadgraditi osnovno poznavanje in razumevanje pojmov matematične analize in linearne algebre z zahtevnejšimi pojmi, prikazati njihovo uporabo pri matematičnem modeliranju pojavov v računalništvu in drugih znanostih in osnovne metode za računanje dobljenih modelov.','id_nosilca'=>2,'KT'=>6,'tip'=>'strokovni-izbirni']);

        Predmet::create(['sifra'=>'63254','naziv'=>'Postopki razvoja programske opreme','opis'=>'Cilj predmeta je pridobiti znanja o postopkih razvoja programske opreme s posebnim poudarkom na razvoju strežniških (server-side, datacenter, cloud) aplikacij, torej aplikacij, ki se uporabljajo v velikih informacijskih sistemih podjetij ali velikih spletnih aplikacij (npr. Facebook, LinkedIn, spletnih trgovin kot so Amazon, mimovrste, ebay in podobnih).','id_nosilca'=>4,'KT'=>6,'id_modula'=>1]);
        Predmet::create(['sifra'=>'63255','naziv'=>'Spletno programiranje','opis'=>'Pri predmetu Spletno programiranje se bomo posvetili pregledu nad tehnologijami, ki se uporabljajo pri delovanju spleta, spletnih strežnikov, brskalnikov in spletnih aplikacij. Pregledali bomo osnove izdelave in oblikovanja spletnih strani (HTML5, CSS, XML) ter jih nadgradili s pregledom tehnologij na strani klienta (JavaScript) in strežnika (PHP, AJAX, JavaServer, ASP.NET, Ruby/Rails, spletne storitve).','id_nosilca'=>5,'KT'=>6,'id_modula'=>1]);
        Predmet::create(['sifra'=>'63256','naziv'=>'Tehnologije programske opreme','opis'=>'Predstavljajte si razvijalca programske opreme, od katerega naročnik želi, da izdela rešitev, ki mu bo (seveda s pomočjo računalnika) olajšala delo na določenem področju. Razvijalec mora najprej ugotoviti, kakšne so zahteve uporabnikov, na podlagi tega izdelati načrt rešitve, napisati potrebne programe, jih stestirati in predati v uporabo ter nato vzdrževati do konca njihove življenjske dobe. Pri predmetu Tehnologija programske opreme se boste naučili, kako to narediti z uporabo najnovejših pristopov k razvoju programske opreme.','id_nosilca'=>1,'KT'=>6,'id_modula'=>1]);
        Predmet::create(['sifra'=>'63246','naziv'=>'Komuniciranje in vodenje projektov','opis'=>'Prvi cilj predmeta je osvežitev in nadgradnja osnovnih komunikacijskih kompetenc (pisno izražanje, govor, komuniciranje po medmrežju), predvsem v povezavi s poročanjem o strokovnih temah in z uporabo sodobnih informacijskih tehnologij. Drugi del predmeta študente seznani z osnovnimi načini organizacije projektnega načina dela.','id_nosilca'=>6,'KT'=>6]);
        Predmet::create(['sifra'=>'63248','naziv'=>'Ekonomika in podjetništvo','opis'=>'Temeljni namen predmeta je seznanitev študenta s področjem ekonomske znanosti na ravni združb (podjetij, zavodov itn.), zato da bo usposobljen dojemati vsebino tistih strokovnih pogovorov, ki vsebujejo ekonomske pojme, ter dejavno sodelovati v njih. Iz tega namena izvedeni cilji so zagotoviti tako poznavanje temeljnih ekonomskih pojmov in njihove medsebojne odvisnosti kot tudi sposobnost vključevanja teh pojmov v razmere praktičnega dela, zlasti v zvezi z ustanavljanjem in delovanjem podjetij v lasti gospodarskih družb, ko se bo kot diplomant soočil s potrebo ovrednotenja določenih stanj, procesov in izidov.','id_nosilca'=>7,'KT'=>6]);

        Predmet::create(['sifra'=>'63508', 'naziv'=>'Algoritmi','opis'=>'Govorimo o algoritmih in podatkovnih strukturah. To so za računalnikarja orodja, s katerimi realizira svoje, še tako divje ideje.','id_nosilca'=>9,'KT'=>6]);


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

        //janez novak, sluzi za kartotecni list (zgodovina programov in let)
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2012-09-20', 'vloga_potrjena'=>'2012-09-26', 'datum_vpisa'=>'2012-09-26', 'studijsko_leto'=>'2012/2013', 'letnik'=>1]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2013-09-20', 'vloga_potrjena'=>'2013-09-26', 'datum_vpisa'=>'2013-09-26', 'studijsko_leto'=>'2013/2014', 'letnik'=>2]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-26', 'datum_vpisa'=>'2014-09-26', 'studijsko_leto'=>'2014/2015', 'letnik'=>3]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>3, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2015-09-20', 'vloga_potrjena'=>'2015-09-26', 'datum_vpisa'=>'2015-09-26', 'studijsko_leto'=>'2015/2016', 'letnik'=>1]);

        DB::table('student_program')->insert(['id_studenta'=>3, 'id_programa'=>3, 'vrsta_vpisa'=>2, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-26', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>1]);
        DB::table('student_program')->insert(['id_studenta'=>1, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2013-09-20', 'vloga_potrjena'=>'2013-09-25', 'datum_vpisa'=>'2014-09-25', 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>1, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-25', 'datum_vpisa'=>null, 'studijsko_leto'=>'2015/2016', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>1, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2013-09-20', 'vloga_potrjena'=>'2014-09-25', 'datum_vpisa'=>'2014-09-25', 'studijsko_leto'=>'2013/2014', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>1, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>2, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2015-04-01', 'vloga_potrjena'=>null, 'datum_vpisa'=>null, 'studijsko_leto'=>'2015/2016', 'letnik'=>1 ]);

        DB::table('student_program')->insert(['id_studenta'=>6, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>7, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>8, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>1 ]);

        DB::table('student_program')->insert(['id_studenta'=>9, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>10, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>11, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>12, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);

        DB::table('student_program')->insert(['id_studenta'=>13, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>14, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>15, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>16, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>17, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);

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

        DB::table('sklep')->truncate();
        Sklep::create(['id_studenta'=>1, 'datum'=>'2014-10-01', 'vsebina'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non urna a neque sollicitudin tristique id quis diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut arcu velit, rhoncus quis felis sit amet, molestie congue felis. Donec rhoncus pellentesque nunc, congue congue mauris malesuada eu. Phasellus in turpis at nisl auctor blandit. Vivamus consectetur est eget sapien bibendum porttitor. Aliquam rhoncus commodo nisi pharetra tempor. Praesent vel magna vitae est interdum iaculis at sit amet felis.']);
        Sklep::create(['id_studenta'=>2, 'datum'=>'2015-04-17', 'vsebina'=>'Vestibulum placerat tortor mi, a sollicitudin justo maximus nec. Integer et commodo elit. Etiam sodales varius vestibulum. Sed justo libero, mattis non sapien eu, euismod sagittis erat. Integer efficitur consequat diam, sed ornare felis dictum nec. Fusce auctor lobortis molestie. Mauris nec pulvinar mi.']);
        Sklep::create(['id_studenta'=>1, 'datum'=>'2014-10-05', 'vsebina'=>'Nullam hendrerit nulla id orci pretium, ut fermentum mi facilisis. Proin aliquam feugiat ante ut pulvinar. Etiam vitae ultrices erat. Aenean lobortis lacus dapibus, aliquet tortor in, consectetur arcu. Morbi at lectus in sem blandit dapibus eget sed metus. Nulla a leo quis elit tincidunt venenatis id ut ex. Praesent ac semper tellus. Nullam at metus metus. Nulla vel arcu tincidunt, ullamcorper purus vel, faucibus mi. Proin et purus a diam laoreet imperdiet non sed diam. Interdum et malesuada fames ac ante ipsum primis in faucibus.']);
        Sklep::create(['id_studenta'=>2, 'datum'=>'2014-11-19', 'vsebina'=>'Nullam hendrerit nulla id orci pretium, ut fermentum mi facilisis. Proin aliquam feugiat ante ut pulvinar. Etiam vitae ultrices erat. Aenean lobortis lacus dapibus, aliquet tortor in, consectetur arcu. Morbi at lectus in sem blandit dapibus eget sed metus. Nulla a leo quis elit tincidunt venenatis id ut ex. Praesent ac semper tellus. Nullam at metus metus. Nulla vel arcu tincidunt, ullamcorper purus vel, faucibus mi. Proin et purus a diam laoreet imperdiet non sed diam. Interdum et malesuada fames ac ante ipsum primis in faucibus.']);
        Sklep::create(['id_studenta'=>3, 'datum'=>'2014-11-22', 'vsebina'=>'Donec eget urna eget urna tincidunt lacinia sed sed ipsum. Mauris non pretium diam. Maecenas ut sodales magna, at consequat risus. Ut sed pretium ligula, eget porttitor nulla. Quisque aliquam metus vitae diam ultricies, venenatis ultrices mauris viverra. Aenean diam ipsum, pulvinar ac pellentesque at, euismod rutrum nibh. Pellentesque metus elit, auctor vel eros id, consectetur laoreet arcu.']);
        Sklep::create(['id_studenta'=>3, 'datum'=>'2015-02-14', 'vsebina'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non urna a neque sollicitudin tristique id quis diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut arcu velit, rhoncus quis felis sit amet, molestie congue felis. Donec rhoncus pellentesque nunc, congue congue mauris malesuada eu. Phasellus in turpis at nisl auctor blandit. Vivamus consectetur est eget sapien bibendum porttitor. Aliquam rhoncus commodo nisi pharetra tempor. Praesent vel magna vitae est interdum iaculis at sit amet felis.']);
        Sklep::create(['id_studenta'=>4, 'datum'=>'2014-12-20', 'vsebina'=>'Donec eget urna eget urna tincidunt lacinia sed sed ipsum. Mauris non pretium diam. Maecenas ut sodales magna, at consequat risus. Ut sed pretium ligula, eget porttitor nulla. Quisque aliquam metus vitae diam ultricies, venenatis ultrices mauris viverra. Aenean diam ipsum, pulvinar ac pellentesque at, euismod rutrum nibh. Pellentesque metus elit, auctor vel eros id, consectetur laoreet arcu.']);
        Sklep::create(['id_studenta'=>5, 'datum'=>'2014-12-20', 'vsebina'=>'Donec eget urna eget urna tincidunt lacinia sed sed ipsum. Mauris non pretium diam. Maecenas ut sodales magna, at consequat risus. Ut sed pretium ligula, eget porttitor nulla. Quisque aliquam metus vitae diam ultricies, venenatis ultrices mauris viverra. Aenean diam ipsum, pulvinar ac pellentesque at, euismod rutrum nibh. Pellentesque metus elit, auctor vel eros id, consectetur laoreet arcu.']);
        Sklep::create(['id_studenta'=>4, 'datum'=>'2015-03-20', 'vsebina'=>'Vestibulum placerat tortor mi, a sollicitudin justo maximus nec. Integer et commodo elit. Etiam sodales varius vestibulum. Sed justo libero, mattis non sapien eu, euismod sagittis erat. Integer efficitur consequat diam, sed ornare felis dictum nec. Fusce auctor lobortis molestie. Mauris nec pulvinar mi.']);
        Sklep::create(['id_studenta'=>5, 'datum'=>'2015-04-01', 'vsebina'=>'Vestibulum placerat tortor mi, a sollicitudin justo maximus nec. Integer et commodo elit. Etiam sodales varius vestibulum. Sed justo libero, mattis non sapien eu, euismod sagittis erat. Integer efficitur consequat diam, sed ornare felis dictum nec. Fusce auctor lobortis molestie. Mauris nec pulvinar mi.']);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
