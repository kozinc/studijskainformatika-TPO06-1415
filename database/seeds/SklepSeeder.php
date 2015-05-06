<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:30
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sklep;


class SklepSeeder extends Seeder
{

    public function run()
    {
        DB::table('sklep')->truncate();
        Sklep::create(['id_studenta'=>1, 'datum_izdaje'=>'2014-10-01', 'datum_veljavnosti'=>'2015-10-01', 'id_organa'=>1, 'vsebina'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non urna a neque sollicitudin tristique id quis diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut arcu velit, rhoncus quis felis sit amet, molestie congue felis. Donec rhoncus pellentesque nunc, congue congue mauris malesuada eu. Phasellus in turpis at nisl auctor blandit. Vivamus consectetur est eget sapien bibendum porttitor. Aliquam rhoncus commodo nisi pharetra tempor. Praesent vel magna vitae est interdum iaculis at sit amet felis.']);
        Sklep::create(['id_studenta'=>2, 'datum_izdaje'=>'2015-04-17', 'id_organa'=>2, 'vsebina'=>'Vestibulum placerat tortor mi, a sollicitudin justo maximus nec. Integer et commodo elit. Etiam sodales varius vestibulum. Sed justo libero, mattis non sapien eu, euismod sagittis erat. Integer efficitur consequat diam, sed ornare felis dictum nec. Fusce auctor lobortis molestie. Mauris nec pulvinar mi.']);
        Sklep::create(['id_studenta'=>1, 'datum_izdaje'=>'2014-10-05', 'datum_veljavnosti'=>'2015-10-05',  'id_organa'=>2,' vsebina'=>'Nullam hendrerit nulla id orci pretium, ut fermentum mi facilisis. Proin aliquam feugiat ante ut pulvinar. Etiam vitae ultrices erat. Aenean lobortis lacus dapibus, aliquet tortor in, consectetur arcu. Morbi at lectus in sem blandit dapibus eget sed metus. Nulla a leo quis elit tincidunt venenatis id ut ex. Praesent ac semper tellus. Nullam at metus metus. Nulla vel arcu tincidunt, ullamcorper purus vel, faucibus mi. Proin et purus a diam laoreet imperdiet non sed diam. Interdum et malesuada fames ac ante ipsum primis in faucibus.']);
        Sklep::create(['id_studenta'=>2, 'datum_izdaje'=>'2014-11-19', 'id_organa'=>4, 'vsebina'=>'Nullam hendrerit nulla id orci pretium, ut fermentum mi facilisis. Proin aliquam feugiat ante ut pulvinar. Etiam vitae ultrices erat. Aenean lobortis lacus dapibus, aliquet tortor in, consectetur arcu. Morbi at lectus in sem blandit dapibus eget sed metus. Nulla a leo quis elit tincidunt venenatis id ut ex. Praesent ac semper tellus. Nullam at metus metus. Nulla vel arcu tincidunt, ullamcorper purus vel, faucibus mi. Proin et purus a diam laoreet imperdiet non sed diam. Interdum et malesuada fames ac ante ipsum primis in faucibus.']);
        Sklep::create(['id_studenta'=>3, 'datum_izdaje'=>'2014-11-22', 'datum_veljavnosti'=>'2015-10-01', 'id_organa'=>2, 'vsebina'=>'Donec eget urna eget urna tincidunt lacinia sed sed ipsum. Mauris non pretium diam. Maecenas ut sodales magna, at consequat risus. Ut sed pretium ligula, eget porttitor nulla. Quisque aliquam metus vitae diam ultricies, venenatis ultrices mauris viverra. Aenean diam ipsum, pulvinar ac pellentesque at, euismod rutrum nibh. Pellentesque metus elit, auctor vel eros id, consectetur laoreet arcu.']);
        Sklep::create(['id_studenta'=>3, 'datum_izdaje'=>'2015-02-14', 'id_organa'=>2, 'vsebina'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non urna a neque sollicitudin tristique id quis diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut arcu velit, rhoncus quis felis sit amet, molestie congue felis. Donec rhoncus pellentesque nunc, congue congue mauris malesuada eu. Phasellus in turpis at nisl auctor blandit. Vivamus consectetur est eget sapien bibendum porttitor. Aliquam rhoncus commodo nisi pharetra tempor. Praesent vel magna vitae est interdum iaculis at sit amet felis.']);
        Sklep::create(['id_studenta'=>4, 'datum_izdaje'=>'2014-12-20', 'id_organa'=>1, 'vsebina'=>'Donec eget urna eget urna tincidunt lacinia sed sed ipsum. Mauris non pretium diam. Maecenas ut sodales magna, at consequat risus. Ut sed pretium ligula, eget porttitor nulla. Quisque aliquam metus vitae diam ultricies, venenatis ultrices mauris viverra. Aenean diam ipsum, pulvinar ac pellentesque at, euismod rutrum nibh. Pellentesque metus elit, auctor vel eros id, consectetur laoreet arcu.']);
        Sklep::create(['id_studenta'=>5, 'datum_izdaje'=>'2014-12-20', 'id_organa'=>4, 'vsebina'=>'Donec eget urna eget urna tincidunt lacinia sed sed ipsum. Mauris non pretium diam. Maecenas ut sodales magna, at consequat risus. Ut sed pretium ligula, eget porttitor nulla. Quisque aliquam metus vitae diam ultricies, venenatis ultrices mauris viverra. Aenean diam ipsum, pulvinar ac pellentesque at, euismod rutrum nibh. Pellentesque metus elit, auctor vel eros id, consectetur laoreet arcu.']);
        Sklep::create(['id_studenta'=>4, 'datum_izdaje'=>'2015-03-20', 'datum_veljavnosti'=>'2016-10-05', 'id_organa'=>5, 'vsebina'=>'Vestibulum placerat tortor mi, a sollicitudin justo maximus nec. Integer et commodo elit. Etiam sodales varius vestibulum. Sed justo libero, mattis non sapien eu, euismod sagittis erat. Integer efficitur consequat diam, sed ornare felis dictum nec. Fusce auctor lobortis molestie. Mauris nec pulvinar mi.']);
        Sklep::create(['id_studenta'=>5, 'datum_izdaje'=>'2015-04-01', 'id_organa'=>4, 'vsebina'=>'Vestibulum placerat tortor mi, a sollicitudin justo maximus nec. Integer et commodo elit. Etiam sodales varius vestibulum. Sed justo libero, mattis non sapien eu, euismod sagittis erat. Integer efficitur consequat diam, sed ornare felis dictum nec. Fusce auctor lobortis molestie. Mauris nec pulvinar mi.']);


    }
}