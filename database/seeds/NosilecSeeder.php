<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:13
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nosilec;


class NosilecSeeder extends Seeder
{

    public function run()
    {
        DB::table('nosilec')->truncate();
        Nosilec::create(['id' => 1, 'ime' => 'Viljan', 'priimek' => 'Mahnič', 'naziv' => 'izr. prof. dr.', 'vloga' => '', 'geslo' => Hash::make('viljanmahnic'), 'email' => 'viljan.mahnic@fri.uni-lj.si']);
        Nosilec::create(['id' => 2, 'ime' => 'Neža', 'priimek' => 'Mramor Kosta', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('nezamramorkosta'), 'email' => 'neza.mramor@fri.uni-lj.si']);
        Nosilec::create(['id' => 3, 'ime' => 'Gašper', 'priimek' => 'Fijavž', 'naziv' => 'izr. prof. dr.', 'vloga' => '', 'geslo' => Hash::make('gasperfijavz'), 'email' => 'gasper.fijavz@fri.uni-lj.si']);
        Nosilec::create(['id' => 4, 'ime' => 'Matjaž', 'priimek' => 'Branko Jurič', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('matjazbrankojuric'), 'email' => 'mazjaz.juric@fri.uni-lj.si']);
        Nosilec::create(['id' => 5, 'ime' => 'Aleš', 'priimek' => 'Smrdel', 'naziv' => 'doc. dr.', 'vloga' => '', 'geslo' => Hash::make('alessmrdel'), 'email' => 'ales.smrdel@fri.uni-lj.si']);
        Nosilec::create(['id' => 6, 'ime' => 'Franc', 'priimek' => 'Solina', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('francsolina'), 'email' => 'franc.solina@fri.uni-lj.si']);
        Nosilec::create(['id' => 7, 'ime' => 'Mateja', 'priimek' => 'Drnovšek', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('matejadrnovsek'), 'email' => 'mateja.drnovsek@fri.uni-lj.si']);
        Nosilec::create(['id' => 8, 'ime' => 'Aleksandar', 'priimek' => 'Jurišić', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('aleksandarjurisic'), 'email' => 'aleksandar.jurisic@fri.uni-lj.si']);
        Nosilec::create(['id' => 9, 'ime' => 'Marko', 'priimek' => 'Robnik Šikonja', 'naziv' => 'izr. prof. dr.', 'vloga' => '', 'geslo' => Hash::make('markorobniksikonja'), 'email' => 'marko.robniksikonja@fri.uni-lj.si']);
        Nosilec::create(['id' => 10, 'ime' => 'Nikolaj', 'priimek' => 'Zimic', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('nikolajzimic'), 'email' => 'nikolaj.zimic@fri.uni-lj.si']);
        Nosilec::create(['id' => 11, 'ime' => 'Irena', 'priimek' => 'Drevenšek Olenik', 'naziv' => 'izr. prof. dr.', 'vloga' => '', 'geslo' => Hash::make('irenadrevensekolenik'), 'email' => 'irena.drevensekolenik@fri.uni-lj.si']);
        Nosilec::create(['id' => 12, 'ime' => 'Boštjan', 'priimek' => 'Slivnik', 'naziv' => 'doc. dr.', 'vloga' => '', 'geslo' => Hash::make('bostjanslivnik'), 'email' => 'bostjan.slivnik@fri.uni-lj.si']);
        Nosilec::create(['id' => 13, 'ime' => 'Bojan', 'priimek' => 'Orel', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('bojanorel'), 'email' => 'bojan.orel@fri.uni-lj.si']);
        Nosilec::create(['id' => 14, 'ime' => 'Marko', 'priimek' => 'Bajec', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('markobajec'), 'email' => 'marko.bajec@fri.uni-lj.si']);
        Nosilec::create(['id' => 15, 'ime' => 'Zoran', 'priimek' => 'Bosnić', 'naziv' => 'izr. prof. dr.', 'vloga' => '', 'geslo' => Hash::make('zoranbosnic'), 'email' => 'zoran.bosnic@fri.uni-lj.si']);
        Nosilec::create(['id' => 16, 'ime' => 'Franc', 'priimek' => 'Jager', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('francjager'), 'email' => 'franc.jager@fri.uni-lj.si']);
        Nosilec::create(['id' => 17, 'ime' => 'Igor', 'priimek' => 'Kononenko', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('igorkononenko'), 'email' => 'igor.kononenko@fri.uni-lj.si']);
        Nosilec::create(['id' => 18, 'ime' => 'Branko', 'priimek' => 'Šter', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('brankoster'), 'email' => 'branko.ster@fri.uni-lj.si']);
        Nosilec::create(['id' => 19, 'ime' => 'Borut', 'priimek' => 'Robič', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('borutrobic'), 'email' => 'borut.robic@fri.uni-lj.si']);
        Nosilec::create(['id' => 20, 'ime' => 'Dejan', 'priimek' => 'Lavbič', 'naziv' => 'doc. dr.', 'vloga' => '', 'geslo' => Hash::make('dejanlavbic'), 'email' => 'dejan.lavbic@fri.uni-lj.si']);
        Nosilec::create(['id' => 21, 'ime' => 'Uroš', 'priimek' => 'Lotrič', 'naziv' => 'izr. prof. dr.', 'vloga' => '', 'geslo' => Hash::make('uroslotric'), 'email' => 'uros.lotric@fri.uni-lj.si']);
        Nosilec::create(['id' => 22, 'ime' => 'Patricio', 'priimek' => 'Bulić', 'naziv' => 'izr. prof. dr.', 'vloga' => '', 'geslo' => Hash::make('patriciobulic'), 'email' => 'patricio.bulic@fri.uni-lj.si']);
        Nosilec::create(['id' => 23, 'ime' => 'Matjaž', 'priimek' => 'Branko Jurič', 'naziv' => 'prof. dr.', 'vloga' => '', 'geslo' => Hash::make('matjazbrankojuric'), 'email' => 'matjaz.brankojuric@fri.uni-lj.si']);
        Nosilec::create(['id' => 24, 'ime' => 'Matija', 'priimek' => 'Marolt', 'naziv' => 'doc. dr.', 'vloga' => '', 'geslo' => Hash::make('matijamarolt'), 'email' => 'matija.marolt@fri.uni-lj.si']);
        Nosilec::create(['id' => 25, 'ime' => 'Luka', 'priimek' => 'Šajn', 'naziv' => 'doc. dr.', 'vloga' => '', 'geslo' => Hash::make('lukasajn'), 'email' => 'luka.sajn@fri.uni-lj.si']);
        Nosilec::create(['id' => 26, 'ime' => 'Narvika', 'priimek' => 'Bovcon', 'naziv' => 'doc. dr.', 'vloga' => '', 'geslo' => Hash::make('narvikabovcon'), 'email' => 'narvika.bovcon@fri.uni-lj.si']);
        Nosilec::create(['id' => 27, 'ime' => 'Polona', 'priimek' => 'Oblak', 'naziv' => 'izr. prof. dr.', 'vloga' => '', 'geslo' => Hash::make('polonaoblak'), 'email' => 'polona.oblak@fri.uni-lj.si']);
        Nosilec::create(['id' => 28, 'ime' => 'Jaka', 'priimek' => 'Lindič', 'naziv' => 'doc. dr.', 'geslo' => Hash::make('jakalindic'), 'email' => 'jaka.lindic@fri.uni-lj.si']);
        Nosilec::create(['id' => 29, 'ime' => 'Marina', 'priimek' => 'Štros Bračko', 'naziv' => 'viš. pred.', 'geslo' => Hash::make('marinabracko'), 'email' => 'marina.bracko@fri.uni-lj.si']);
        Nosilec::create(['id' => 30, 'ime' => 'Iztok', 'priimek' => 'Mihevc', 'naziv' => 'pred. spec.', 'geslo' => Hash::make('iztokmihevc'), 'email' => 'iztok.mihevc@fri.uni-lj.si']);
        Nosilec::create(['id' => 31, 'ime' => 'Zoran', 'priimek' => 'Arizanović', 'naziv' => 'doc. mag.', 'geslo' => Hash::make('zoranarizanovic'), 'email' => 'zoran.arizanovic@fri.uni-lj.si']);
        Nosilec::create(['id' => 32, 'ime' => 'Aleš', 'priimek' => 'Špetič', 'naziv' => '', 'geslo' => Hash::make('alesspetic'), 'email' => 'ales.spetic@fri.uni-lj.si']);
        Nosilec::create(['id' => 33, 'ime' => 'Mojca', 'priimek' => 'Ciglarič', 'naziv' => 'doc. dr.', 'geslo' => Hash::make('mojcaciglaric'), 'email' => 'mojca.ciglaric@fri.uni-lj.si']);
        Nosilec::create(['id' => 34, 'ime' => 'Miha', 'priimek' => 'Mraz', 'naziv' => 'prof. dr.', 'geslo' => Hash::make('mihamraz'), 'email' => 'miha.mraz@fri.uni-lj.si']);

    }
}