<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:13
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudijskiProgram;


class StudijskiProgramSeeder extends Seeder
{

    public function run()
    {
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

    }
}