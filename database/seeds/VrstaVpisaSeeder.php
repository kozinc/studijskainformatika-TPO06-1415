<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:29
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\VrstaVpisa;


class VrstaVpisaSeeder extends Seeder
{

    public function run()
    {
        DB::table('vrsta_vpisa')->truncate();
        DB::table('vrsta_vpisa')->insert(['sifra'=>1, 'ime'=>'Prvi vpis v letnik/dodatno leto', 'mozni_letniki'=>'Vsi letniki in dodatno leto.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>2, 'ime'=>'Ponavljanje letnika', 'mozni_letniki'=>'V zadnjem letniku in v dodatnem letu ponavljanje ni več možno.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>3, 'ime'=>'Nadaljevanje letnika', 'mozni_letniki'=>'Vpis ni več dovoljen.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>4, 'ime'=>'Podaljsanje statusa študenta', 'mozni_letniki'=>'Vsi letniki, dodatno leto.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>5, 'ime'=>'Brez vpisa', 'mozni_letniki'=>'Vpis ni več dovoljen.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>8, 'ime'=>'Vpis v semester skupnega štuudijskega programa', 'mozni_letniki'=>'Vsi letniki, samo za skupne študijske programe.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>7, 'ime'=>'Vpis po merilih za prehode v višji letnik', 'mozni_letniki'=>'Vsi letniki razen prvega, dodatno leto ni dovoljeno.']);
        DB::table('vrsta_vpisa')->insert(['sifra'=>98, 'ime'=>'Vpis za zaključek', 'mozni_letniki'=>'Zadnji letnik. Namenjeno samo strokovnim delavcem v študentskem referatu.']);

    }
}