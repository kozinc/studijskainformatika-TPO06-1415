<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\StudijskiProgram;
use App\Models\IzpitniRok;
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


        Student::create(['vpisna' => '63120340', 'ime' => 'Neža', 'priimek' => 'Belej', 'email' => 'nezabelej@gmail.com','geslo' => \Hash::make('nezabelej'), 'emso' => '0812992505123', 'davcna' => '12345678', 'spol' => 'ženski','naslovPosta' => 'Brstnik 4', 'obcinaPosta' => 'Laško', 'postaPosta' => '3270', 'drzavaPosta' => 'Slovenija' ,'naslov' => 'Brstnik 4', 'obcina' => 'Laško', 'posta' => '3270', 'drzava' => 'Slovenija', 'datum_rojstva'=>'1992-12-08', 'obcina_rojstva' => 'Trbovlje', 'drzava_rojstva' => 'Slovenija', 'drzavljanstvo' => 'slovensko', 'telefon' => '031683852']);
        Student::create(['vpisna' => '63120136', 'ime' => 'Veronika', 'priimek' => 'Blažič', 'email' => 'veronikablazic@gmail.com','geslo' => \Hash::make('veronikablazic'), 'emso' => '2309993505223', 'posta' => '5000', 'datum_rojstva' => '1993-09-23', 'obcina_rojstva' => 'Nova Gorica','telefon' => '031683678']);
        Student::create(['vpisna' => '63130385', 'ime' => 'Nejc', 'priimek' => 'Bizjak', 'email' => 'neco.bizjak@gmail.com','geslo' => \Hash::make('nejcbizjak'), 'emso' => '1307991500333', 'posta' => '5272', 'datum_rojstva' => '1991-07-13', 'obcina_rojstva' => 'Nova Gorica','telefon' => '031999023']);
        Student::create(['vpisna' => '63120111', 'ime' => 'Janez', 'priimek' => 'Novak', 'email' => 'janeznovak@gmail.com', 'geslo' =>\Hash::make('janeznovak'),'telefon'=>'040222934' ]);
        Student::create(['vpisna' => '63150000', 'ime' => 'Miha', 'priimek' => 'Vesel', 'email' => 'mihavesel@gmail.com','geslo' => \Hash::make('mihavesel'), 'emso' => '2207994500234', 'posta' => '3000', 'datum_rojstva' => '1994-07-22', 'obcina_rojstva' => 'Celje','telefon' => '041874852']);
        Student::create(['vpisna' => '63150001', 'ime' => 'Samo', 'priimek' => 'Veter', 'email' => 'samoveter@gmail.com','geslo' => \Hash::make('samoveter'), 'emso' => '0707994500334', 'posta' => '1000', 'datum_rojstva' => '1994-07-07', 'obcina_rojstva' => 'Ljubljana','telefon' => '041288355']);
        Student::create(['vpisna' => '63150002', 'ime' => 'Janez', 'priimek' => 'Mustaš', 'email' => 'janezmustas@gmail.com','geslo' => \Hash::make('janezmustas'), 'emso' => '0806994500434', 'posta' => '1000', 'datum_rojstva' => '1994-06-08', 'obcina_rojstva' => 'Ljubljana','telefon' => '041011789']);
        Student::create(['vpisna' => '63150003', 'ime' => 'Marko', 'priimek' => 'Petač', 'email' => 'markopetac@gmail.com','geslo' => \Hash::make('markopetac'), 'emso' => '0806994500534', 'posta' => '1000', 'datum_rojstva' => '1994-06-08', 'obcina_rojstva' => 'Ljubljana','telefon' => '050864326']);
        Student::create(['vpisna' => '63150004', 'ime' => 'Ivanka', 'priimek' => 'Uhan', 'email' => 'ivankauhan@gmail.com','geslo' => \Hash::make('ivankauhan'), 'emso' => '0101994505535', 'posta' => '1000', 'datum_rojstva' => '1994-01-01', 'obcina_rojstva' => 'Ljubljana','telefon' => '041888999']);
        Student::create(['vpisna' => '63140014', 'ime' => 'Jagoda', 'priimek' => 'Lipoglavšek', 'email' => 'jagodalipoglavsek@gmail.com','geslo' => \Hash::make('ivankauhan'), 'emso' => '0101993505535', 'posta' => '1000', 'datum_rojstva' => '1993-01-01', 'obcina_rojstva' => 'Ljubljana','telefon' => '070192533']);
        Student::create(['vpisna' => '63140015', 'ime' => 'Gregor', 'priimek' => 'Ivanec', 'email' => 'gregorivanec@gmail.com','geslo' => \Hash::make('gregorivanec'), 'emso' => '0110993500559', 'posta' => '1000', 'datum_rojstva' => '1993-10-01', 'obcina_rojstva' => 'Ljubljana','telefon' => '041899333']);
        Student::create(['vpisna' => '63140016', 'ime' => 'Jurij', 'priimek' => 'Opeka', 'email' => 'jurijopeka@gmail.com','geslo' => \Hash::make('jurijopeka'), 'emso' => '0110993500537', 'posta' => '1000', 'datum_rojstva' => '1993-10-01', 'obcina_rojstva' => 'Ljubljana','telefon' => '041078443']);
        Student::create(['vpisna' => '63140017', 'ime' => 'Nikolaj', 'priimek' => 'Mulec', 'email' => 'nikolajmulec@gmail.com','geslo' => \Hash::make('nikolajmulec'), 'emso' => '1911993505935', 'posta' => '1000', 'datum_rojstva' => '1993-11-19', 'obcina_rojstva' => 'Ljubljana','telefon' => '031287543']);
        Student::create(['vpisna' => '63130007', 'ime' => 'Arnold', 'priimek' => 'Schwartzeneger', 'email' => 'arnoldschwartzeneger@gmail.com','geslo' => \Hash::make('arnoldschwartzeneger'), 'emso' => '1901993505935', 'posta' => '1000', 'datum_rojstva' => '1992-01-19', 'obcina_rojstva' => 'Ljubljana','telefon' => '040642222']);
        Student::create(['vpisna' => '63130008', 'ime' => 'Evelyn', 'priimek' => 'Borin', 'email' => 'evelynborin@gmail.com','geslo' => \Hash::make('evelynborin'), 'emso' => '1902993505935', 'posta' => '1000', 'datum_rojstva' => '1992-02-19', 'obcina_rojstva' => 'Ljubljana','telefon' => '041967333']);
        Student::create(['vpisna' => '63130009', 'ime' => 'Miha', 'priimek' => 'Dlan', 'email' => 'mihadlan@gmail.com','geslo' => \Hash::make('mihadlan'), 'emso' => '1903993505935', 'posta' => '1000', 'datum_rojstva' => '1992-03-19', 'obcina_rojstva' => 'Ljubljana','telefon' => '040222777']);
        Student::create(['vpisna' => '63130010', 'ime' => 'Rok', 'priimek' => 'Pogorelec', 'email' => 'rokpogorelec@gmail.com','geslo' => \Hash::make('rokpogorelec'), 'emso' => '1904993505935', 'posta' => '1000', 'datum_rojstva' => '1992-04-19', 'obcina_rojstva' => 'Ljubljana','telefon' => '031243875']);
        Student::create(['vpisna' => '63120012', 'ime' => 'Štefan', 'priimek' => 'Zimic', 'email' => 'stefanzimic@gmail.com','geslo' => \Hash::make('stefanzimic'), 'emso' => '1905993505935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana','telefon' => '041888777']);


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
        Nosilec::create(['id'=>10,'ime'=>'Nikolaj' ,'priimek'=>'Zimic', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('nikolajzimic'), 'email'=>'nikolaj.zimic@fri.uni-lj.si']);
        Nosilec::create(['id'=>11,'ime'=>'Irena' ,'priimek'=>'Drevenšek Olenik', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('irenadrevensekolenik'), 'email'=>'irena.drevensekolenik@fri.uni-lj.si']);
        Nosilec::create(['id'=>12,'ime'=>'Boštjan' ,'priimek'=>'Slivnik', 'naziv'=>'doc. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('bostjanslivnik'), 'email'=>'bostjan.slivnik@fri.uni-lj.si']);
        Nosilec::create(['id'=>13,'ime'=>'Bojan' ,'priimek'=>'Orel', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('bojanorel'), 'email'=>'bojan.orel@fri.uni-lj.si']);
        Nosilec::create(['id'=>14,'ime'=>'Marko' ,'priimek'=>'Bajec', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('markobajec'), 'email'=>'marko.bajec@fri.uni-lj.si']);
        Nosilec::create(['id'=>15,'ime'=>'Zoran' ,'priimek'=>'Bosnić', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('zoranbosnic'), 'email'=>'zoran.bosnic@fri.uni-lj.si']);
        Nosilec::create(['id'=>16,'ime'=>'Franc' ,'priimek'=>'Jager', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('francjager'), 'email'=>'franc.jager@fri.uni-lj.si']);
        Nosilec::create(['id'=>17,'ime'=>'Igor' ,'priimek'=>'Kononenko', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('igorkononenko'), 'email'=>'igor.kononenko@fri.uni-lj.si']);
        Nosilec::create(['id'=>18,'ime'=>'Branko' ,'priimek'=>'Šter', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('brankoster'), 'email'=>'branko.ster@fri.uni-lj.si']);
        Nosilec::create(['id'=>19,'ime'=>'Borut' ,'priimek'=>'Robič', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('borutrobic'), 'email'=>'borut.robic@fri.uni-lj.si']);
        Nosilec::create(['id'=>20,'ime'=>'Dejan' ,'priimek'=>'Lavbič', 'naziv'=>'doc. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('dejanlavbic'), 'email'=>'dejan.lavbic@fri.uni-lj.si']);
        Nosilec::create(['id'=>21,'ime'=>'Uroš' ,'priimek'=>'Lotrič', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('uroslotric'), 'email'=>'uros.lotric@fri.uni-lj.si']);
        Nosilec::create(['id'=>22,'ime'=>'Patricio' ,'priimek'=>'Bulić', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('patriciobulic'), 'email'=>'patricio.bulic@fri.uni-lj.si']);
        Nosilec::create(['id'=>23,'ime'=>'Matjaž' ,'priimek'=>'Branko Jurič', 'naziv'=>'prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('matjazbrankojuric'), 'email'=>'matjaz.brankojuric@fri.uni-lj.si']);
        Nosilec::create(['id'=>24,'ime'=>'Matija' ,'priimek'=>'Marolt', 'naziv'=>'doc. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('matijamarolt'), 'email'=>'matija.marolt@fri.uni-lj.si']);
        Nosilec::create(['id'=>25,'ime'=>'Luka' ,'priimek'=>'Šajn', 'naziv'=>'doc. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('lukasajn'), 'email'=>'luka.sajn@fri.uni-lj.si']);
        Nosilec::create(['id'=>26,'ime'=>'Narvika' ,'priimek'=>'Bovcon', 'naziv'=>'doc. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('narvikabovcon'), 'email'=>'narvika.bovcon@fri.uni-lj.si']);
        Nosilec::create(['id'=>27,'ime'=>'Polona' ,'priimek'=>'Oblak', 'naziv'=>'izr. prof. dr.' , 'vloga'=>'' , 'geslo'=>Hash::make('polonaoblak'), 'email'=>'polona.oblak@fri.uni-lj.si']);

        //++++++++++++++++++++++P R E D M E T+++++++++++++++++++++++
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

        Predmet::create(['sifra'=>'63508', 'naziv'=>'Algoritmi','opis'=>'Govorimo o algoritmih in podatkovnih strukturah. To so za računalnikarja orodja, s katerimi realizira svoje, še tako divje ideje.','id_nosilca'=>9,'KT'=>6]);
        Predmet::create(['sifra'=>'63506','naziv'=>'Matematika II','opis'=>'','id_nosilca'=>27,'KT'=>6]);
        Predmet::create(['sifra'=>'63507','naziv'=>'Programiranje','opis'=>'','id_nosilca'=>15,'KT'=>6]);
        Predmet::create(['sifra'=>'63509','naziv'=>'Računalniški sistemi','opis'=>'','id_nosilca'=>18,'KT'=>6]);


        //++++++++++++++++++++++++S T U D E N T_____P R E D M E T+++++++++++++++++++++++++++
        DB::table('student_predmet')->truncate();
        ////////////////////////////JANEZ NOVAK, KARTOTECNI LIST
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>6]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>8, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>9, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>10, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>12, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>14, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>15, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>16, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>17, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>18, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>19, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);

        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>20, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>21, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>22, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>23, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>24, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>25, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>26, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>27, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);

       /* StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>28, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2015/2016']);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>29, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2015/2016']);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>30, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2015/2016']);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>31, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2015/2016']);*/
        ////////////////////////////////////////


        StudentPredmet::create(['id_studenta'=>5, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>6, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>5, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>6, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

       /* StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create([ 'id_studenta'=>8, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>10, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>8, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>10, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>11, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);*/

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
        ////1,2,3,4
        Modul::create(['id_programa'=>1, 'ime'=>'Razvoj programske opreme','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2012/2013']);
        Modul::create(['id_programa'=>1, 'ime'=>'Razvoj programske opreme','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2013/2014']);
        Modul::create(['id_programa'=>1, 'ime'=>'Razvoj programske opreme','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2014/2015']);
        Modul::create(['id_programa'=>1, 'ime'=>'Razvoj programske opreme','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2015/2016']);
        ////5,6,7,8
        Modul::create(['id_programa'=>1, 'ime'=>'Informacijski sistemi','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2012/2013']);
        Modul::create(['id_programa'=>1, 'ime'=>'Informacijski sistemi','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2013/2014']);
        Modul::create(['id_programa'=>1, 'ime'=>'Informacijski sistemi','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2014/2015']);
        Modul::create(['id_programa'=>1, 'ime'=>'Informacijski sistemi','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2015/2016']);
        ////9,10,11,12
        Modul::create(['id_programa'=>1, 'ime'=>'Medijske tehnologije','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2012/2013']);
        Modul::create(['id_programa'=>1, 'ime'=>'Medijske tehnologije','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2013/2014']);
        Modul::create(['id_programa'=>1, 'ime'=>'Medijske tehnologije','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2014/2015']);
        Modul::create(['id_programa'=>1, 'ime'=>'Medijske tehnologije','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2015/2016']);
        ////13,14,15,16
        Modul::create(['id_programa'=>1, 'ime'=>'Računalniška omrežja','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2012/2013']);
        Modul::create(['id_programa'=>1, 'ime'=>'Računalniška omrežja','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2013/2014']);
        Modul::create(['id_programa'=>1, 'ime'=>'Računalniška omrežja','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2014/2015']);
        Modul::create(['id_programa'=>1, 'ime'=>'Računalniška omrežja','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2015/2016']);
        ////17,18,19,20
        Modul::create(['id_programa'=>1, 'ime'=>'Umetna inteligenca','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2012/2013']);
        Modul::create(['id_programa'=>1, 'ime'=>'Umetna inteligenca','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2013/2014']);
        Modul::create(['id_programa'=>1, 'ime'=>'Umetna inteligenca','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2014/2015']);
        Modul::create(['id_programa'=>1, 'ime'=>'Umetna inteligenca','opis'=>'', 'letnik'=>3, 'studijsko_leto'=>'2015/2016']);
        ////

        //+++++++++++++++++++++++++I Z P I T N I     R O K I ++++++++++++++++++++++++++++
        DB::table('izpitni_rok')->truncate();
        IzpitniRok::create(['id_predmeta'=>21, 'izpitni_rok'=>1, 'datum'=>'2015-06-10', 'studijsko_leto'=>'2014/2015']);
        IzpitniRok::create(['id_predmeta'=>21, 'izpitni_rok'=>2, 'datum'=>'2015-06-20', 'studijsko_leto'=>'2014/2015']);
        IzpitniRok::create(['id_predmeta'=>21, 'izpitni_rok'=>3, 'datum'=>'2015-09-03', 'studijsko_leto'=>'2014/2015']);
        ////

        DB::table('student_izpit')->truncate();
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>1, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>2, 'ocena'=>8]);


        DB::table('program_predmet')->truncate();
        //1.letnik BUN-RI 2014/2015
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>1,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>2,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>3,'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>4,'letnik'=>1, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2014/2015']);

        //2.letnik BUN-RI 2014/2015
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>11,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>12,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>13,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>14,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>15,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>16,'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>17,'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>18,'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>19,'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2014/2015']);

        //3.letnik BUN-RI 2014/15
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>6,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>2, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>7,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>2, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>8,'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>2, 'studijsko_leto'=>'2014/2015']);

        //1.letnik BMAG 2015/2016
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>28,'letnik'=>1, 'semester'=>2,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>29,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>30,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>31,'letnik'=>1, 'semester'=>2,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);


        DB::table('student_program')->truncate();

        //janez novak, sluzi za kartotecni list (zgodovina programov in let)
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2012-09-20', 'vloga_potrjena'=>'2012-09-26', 'datum_vpisa'=>'2012-09-26', 'studijsko_leto'=>'2012/2013', 'letnik'=>1]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2013-09-20', 'vloga_potrjena'=>'2013-09-26', 'datum_vpisa'=>'2013-09-26', 'studijsko_leto'=>'2013/2014', 'letnik'=>2]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-26', 'datum_vpisa'=>'2014-09-26', 'studijsko_leto'=>'2014/2015', 'letnik'=>3]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>3, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>null, 'vloga_potrjena'=>null, 'datum_vpisa'=>null, 'studijsko_leto'=>'2015/2016', 'letnik'=>1]);

        DB::table('student_program')->insert(['id_studenta'=>3, 'id_programa'=>3, 'vrsta_vpisa'=>2, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-26', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>1]);
        DB::table('student_program')->insert(['id_studenta'=>1, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>null, 'vloga_potrjena'=>null, 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
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
