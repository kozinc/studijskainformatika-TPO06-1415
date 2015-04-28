<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:51
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modul;


class ModulSeeder extends Seeder
{

    public function run()
    {
        DB::table('modul')->truncate();
        ////1,2,3,4
        Modul::create(['id_programa' => 1, 'ime' => 'Razvoj programske opreme', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2012/2013']);
        Modul::create(['id_programa' => 1, 'ime' => 'Razvoj programske opreme', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2013/2014']);
        Modul::create(['id_programa' => 1, 'ime' => 'Razvoj programske opreme', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2014/2015']);
        Modul::create(['id_programa' => 1, 'ime' => 'Razvoj programske opreme', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2015/2016']);
        ////5,6,7,8
        Modul::create(['id_programa' => 1, 'ime' => 'Informacijski sistemi', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2012/2013']);
        Modul::create(['id_programa' => 1, 'ime' => 'Informacijski sistemi', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2013/2014']);
        Modul::create(['id_programa' => 1, 'ime' => 'Informacijski sistemi', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2014/2015']);
        Modul::create(['id_programa' => 1, 'ime' => 'Informacijski sistemi', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2015/2016']);
        ////9,10,11,12
        Modul::create(['id_programa' => 1, 'ime' => 'Medijske tehnologije', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2012/2013']);
        Modul::create(['id_programa' => 1, 'ime' => 'Medijske tehnologije', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2013/2014']);
        Modul::create(['id_programa' => 1, 'ime' => 'Medijske tehnologije', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2014/2015']);
        Modul::create(['id_programa' => 1, 'ime' => 'Medijske tehnologije', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2015/2016']);
        ////13,14,15,16
        Modul::create(['id_programa' => 1, 'ime' => 'Računalniška omrežja', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2012/2013']);
        Modul::create(['id_programa' => 1, 'ime' => 'Računalniška omrežja', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2013/2014']);
        Modul::create(['id_programa' => 1, 'ime' => 'Računalniška omrežja', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2014/2015']);
        Modul::create(['id_programa' => 1, 'ime' => 'Računalniška omrežja', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2015/2016']);
        ////17,18,19,20
        Modul::create(['id_programa' => 1, 'ime' => 'Umetna inteligenca', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2012/2013']);
        Modul::create(['id_programa' => 1, 'ime' => 'Umetna inteligenca', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2013/2014']);
        Modul::create(['id_programa' => 1, 'ime' => 'Umetna inteligenca', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2014/2015']);
        Modul::create(['id_programa' => 1, 'ime' => 'Umetna inteligenca', 'opis' => '', 'letnik' => 3, 'studijsko_leto' => '2015/2016']);

    }
}