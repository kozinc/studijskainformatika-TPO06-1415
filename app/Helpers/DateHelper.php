<?php namespace App\Helpers;


class DateHelper {

    /**
     * @param string $studijsko_leto
     * @return array|bool false, če ni pravi format. Array [2014,2015], če je ok.
     */
    public static function studijskoLeto($studijsko_leto)
    {
        $leta = explode('/',$studijsko_leto);
        if(count($leta)==2){

            $prvo = $leta[0];
            $drugo = $leta[1];

            if((strlen($prvo) == 2 && strlen($drugo)== 2)){
                if((int)$prvo + 1 == (int)$drugo)
                {
                    return ['20'.$prvo,'20'.$drugo];
                }
            }elseif( strlen($prvo)==4 && strlen($drugo)==4 ){
                if((int)$prvo + 1 == (int)$drugo)
                {
                    return [(int)$prvo,(int)$drugo];
                }
            }
        }
        return false;
    }
}