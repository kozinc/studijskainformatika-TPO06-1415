<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 20:44
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;


class StudentSeeder extends Seeder
{

    public function run()
    {
        DB::table('student')->truncate();

        Student::create(['vpisna' => '63120340', 'ime' => 'Neža', 'priimek' => 'Belej', 'email' => 'nezabelej@gmail.com', 'geslo' => \Hash::make('nezabelej'), 'emso' => '0812992505123', 'davcna' => '12345678', 'spol' => 'ženski', 'naslovPosta' => 'Brstnik 4', 'obcinaPosta' => 'Laško', 'postaPosta' => '3270', 'drzavaPosta' => 'Slovenija', 'naslov' => 'Brstnik 4', 'obcina' => 'Laško', 'posta' => '3270', 'drzava' => 'Slovenija', 'datum_rojstva' => '1992-12-08', 'obcina_rojstva' => 'Trbovlje', 'drzava_rojstva' => 'Slovenija', 'drzavljanstvo' => 'slovensko', 'telefon' => '031683852']);
        Student::create(['vpisna' => '63120136', 'ime' => 'Veronika', 'priimek' => 'Blažič', 'email' => 'veronikablazic@gmail.com', 'geslo' => \Hash::make('veronikablazic'), 'emso' => '2309993505223', 'posta' => '5000', 'datum_rojstva' => '1993-09-23', 'obcina_rojstva' => 'Nova Gorica', 'drzava_rojstva'=>'Slovenija','telefon' => '031683678']);
        Student::create(['vpisna' => '63130385', 'ime' => 'Nejc', 'priimek' => 'Bizjak', 'email' => 'neco.bizjak@gmail.com', 'spol'=>'moški', 'geslo' => \Hash::make('nejcbizjak'), 'emso' => '1307991500333', 'naslov'=>'Podgrič 2', 'posta' => '5272', 'obcina'=>'Vipava','drzava'=>'Slovenija','posiljanje'=>0,'datum_rojstva' => '1991-07-13', 'obcina_rojstva' => 'Nova Gorica', 'drzava_rojstva'=>'Slovenija','telefon' => '031999023','drzavljanstvo'=>'slovensko', 'davcna'=>35688642]);
        Student::create(['vpisna' => '63120111', 'ime' => 'Janez', 'priimek' => 'Novak', 'email' => 'janeznovak@gmail.com', 'geslo' => \Hash::make('janeznovak'), 'telefon' => '040222934', 'emso' => '0101993500123', 'davcna' => '90821234', 'spol' => 'moški', 'naslovPosta' => 'Krojaška 9', 'obcinaPosta' => 'Ljubljana', 'postaPosta' => '1000', 'drzavaPosta' => 'Slovenija', 'naslov' => 'Krojaška 9', 'obcina' => 'Ljubljana', 'posta' => '1000', 'drzava' => 'Slovenija', 'datum_rojstva' => '1993-01-01', 'obcina_rojstva' => 'Ljubljana', 'drzava_rojstva' => 'Slovenija', 'drzavljanstvo' => 'slovensko']);
        Student::create(['vpisna' => '63150000', 'ime' => 'Miha', 'priimek' => 'Vesel', 'email' => 'mihavesel@gmail.com', 'geslo' => \Hash::make('mihavesel'), 'emso' => '2207994500234', 'posta' => '3000', 'datum_rojstva' => '1994-07-22', 'obcina_rojstva' => 'Celje', 'telefon' => '041874852']);

        Student::create(['vpisna' => '63150001', 'ime' => 'Samo', 'priimek' => 'Veter', 'email' => 'samoveter@gmail.com', 'geslo' => \Hash::make('samoveter'), 'emso' => '0707994500334', 'posta' => '1000', 'datum_rojstva' => '1994-07-07', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041288355']);
        Student::create(['vpisna' => '63150002', 'ime' => 'Janez', 'priimek' => 'Mustaš', 'email' => 'janezmustas@gmail.com', 'geslo' => \Hash::make('janezmustas'), 'emso' => '0806994500434', 'posta' => '1000', 'datum_rojstva' => '1994-06-08', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041011789']);
        Student::create(['vpisna' => '63150003', 'ime' => 'Marko', 'priimek' => 'Petač', 'email' => 'markopetac@gmail.com', 'geslo' => \Hash::make('markopetac'), 'emso' => '0806994500534', 'posta' => '1000', 'datum_rojstva' => '1994-06-08', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '050864326']);
        Student::create(['vpisna' => '63120004', 'ime' => 'Ivanka', 'priimek' => 'Uhan', 'email' => 'ivankauhan@gmail.com', 'geslo' => \Hash::make('ivankauhan'), 'spol'=>'ženski','emso' => '0302993500999','naslov'=>'Pečnikova 47d','obcina'=>'Ljubljana', 'posta' => '1000', 'drzava'=>'Slovenija','datum_rojstva' => '1993-02-03', 'obcina_rojstva' => 'Ljubljana', 'drzava_rojstva' => 'Slovenija','telefon' => '041888999','davcna'=>'97862332','drzavljanstvo'=>'slovensko']);
        Student::create(['vpisna' => '63140014', 'ime' => 'Jagoda', 'priimek' => 'Lipoglavšek', 'email' => 'jagodalipoglavsek@gmail.com', 'geslo' => \Hash::make('ivankauhan'), 'emso' => '0101993505535', 'posta' => '1000', 'datum_rojstva' => '1993-01-01', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '070192533']);
        Student::create(['vpisna' => '63140015', 'ime' => 'Gregor', 'priimek' => 'Ivanec', 'email' => 'gregorivanec@gmail.com', 'geslo' => \Hash::make('gregorivanec'), 'emso' => '0110993500559', 'posta' => '1000', 'datum_rojstva' => '1993-10-01', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041899333']);
        Student::create(['vpisna' => '63140016', 'ime' => 'Jurij', 'priimek' => 'Opeka', 'email' => 'jurijopeka@gmail.com', 'geslo' => \Hash::make('jurijopeka'), 'emso' => '0110993500537', 'posta' => '1000', 'datum_rojstva' => '1993-10-01', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041078443']);
        Student::create(['vpisna' => '63140017', 'ime' => 'Nikolaj', 'priimek' => 'Mulec', 'email' => 'nikolajmulec@gmail.com', 'geslo' => \Hash::make('nikolajmulec'), 'emso' => '1911993505935', 'posta' => '1000', 'datum_rojstva' => '1993-11-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '031287543']);
        Student::create(['vpisna' => '63130007', 'ime' => 'Arnold', 'priimek' => 'Schwartzeneger', 'email' => 'arnoldschwartzeneger@gmail.com', 'geslo' => \Hash::make('arnoldschwartzeneger'), 'emso' => '1901993505935', 'posta' => '1000', 'datum_rojstva' => '1992-01-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '040642222']);
        Student::create(['vpisna' => '63130008', 'ime' => 'Evelyn', 'priimek' => 'Borin', 'email' => 'evelynborin@gmail.com', 'geslo' => \Hash::make('evelynborin'), 'emso' => '1902993505935', 'posta' => '1000', 'datum_rojstva' => '1992-02-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041967333']);

        Student::create(['vpisna' => '63130009', 'ime' => 'Miha', 'priimek' => 'Dlan', 'email' => 'mihadlan@gmail.com', 'geslo' => \Hash::make('mihadlan'), 'emso' => '1903992500098', 'posta' => '1000', 'davcna' => '42849293', 'spol' => 'moški', 'naslov' => 'Jadranska 10', 'obcina' => 'Ljubljana',  'drzava_rojstva' => 'Slovenija', 'drzavljanstvo' => 'slovensko', 'drzava' => 'Slovenija', 'datum_rojstva' => '1992-03-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '040222777']);
        Student::create(['vpisna' => '63130010', 'ime' => 'Rok', 'priimek' => 'Pogorelec', 'email' => 'rokpogorelec@gmail.com', 'geslo' => \Hash::make('rokpogorelec'), 'emso' => '1005992500935', 'posta' => '1000', 'davcna' => '41839243', 'datum_rojstva' => '1992-05-10', 'obcina' => 'Ljubljana', 'spol' => 'moški', 'naslov' => 'Hajdrihova 20','drzava_rojstva' => 'Slovenija', 'drzavljanstvo' => 'slovensko', 'drzava'=> 'Slovenija', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '031243875']);
        Student::create(['vpisna' => '63120012', 'ime' => 'Štefan', 'priimek' => 'Zimic', 'email' => 'stefanzimic@gmail.com', 'geslo' => \Hash::make('stefanzimic'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);

        //folk za kazat studente po predmetih
        Student::create(['vpisna' => '63120909', 'ime' => 'Ana', 'priimek' => 'Cojc', 'email' => 'anacojc@gmail.com', 'geslo' => \Hash::make('anacojc'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);
        Student::create(['vpisna' => '63120910', 'ime' => 'Matej', 'priimek' => 'Čotar', 'email' => 'matejcotar@gmail.com', 'geslo' => \Hash::make('matejcotar'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);
        Student::create(['vpisna' => '63120911', 'ime' => 'Denis', 'priimek' => 'Čarlič', 'email' => 'deniscarlic@gmail.com', 'geslo' => \Hash::make('deniscarlic'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);
        Student::create(['vpisna' => '63120912', 'ime' => 'Zoran', 'priimek' => 'Frelih', 'email' => 'zoranfrelih@gmail.com', 'geslo' => \Hash::make('zoranfrelih'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);
        Student::create(['vpisna' => '63120913', 'ime' => 'Adriana', 'priimek' => 'Stormle', 'email' => 'adrianastormle@gmail.com', 'geslo' => \Hash::make('adrianastormle'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);
        Student::create(['vpisna' => '63120914', 'ime' => 'Anabela', 'priimek' => 'Šomlar', 'email' => 'anabelasomlar@gmail.com', 'geslo' => \Hash::make('anabelasomlar'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);
        Student::create(['vpisna' => '63120915', 'ime' => 'Jože', 'priimek' => 'Špacapan', 'email' => 'jozespacapan@gmail.com', 'geslo' => \Hash::make('jozespacapan'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);
        Student::create(['vpisna' => '63120916', 'ime' => 'Tone', 'priimek' => 'Tartuf', 'email' => 'tonetartuf@gmail.com', 'geslo' => \Hash::make('tonetartuf'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);
        Student::create(['vpisna' => '63120917', 'ime' => 'Franc', 'priimek' => 'Zimic', 'email' => 'franczimic@gmail.com', 'geslo' => \Hash::make('franczimic'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);
        Student::create(['vpisna' => '63120918', 'ime' => 'Tilen', 'priimek' => 'Žužek', 'email' => 'tilenzuzek@gmail.com', 'geslo' => \Hash::make('tilenzuzek'), 'emso' => '190599150935', 'posta' => '1000', 'datum_rojstva' => '1991-05-19', 'obcina_rojstva' => 'Ljubljana', 'telefon' => '041888777']);

    }
}