<?php namespace App\Helpers;

use Maatwebsite\Excel\Facades\Excel;

class ExportHelper {

    public function __construct(){

    }

    public static function make_csv(array $data, $title='Naslov', $description='') {
        $file = Excel::create('Test', function($excel) use($data, $title, $description) {

            $excel->setTitle($title);
            $excel->setDescription($description);
            $excel->sheet($title, function($sheet) use($data) {
                $sheet->fromArray($data);
            });

        });
        $file->export('csv');
        return true;
    }

    public static function make_pdf(array $content, $title='Naslov', $description='') {
        $pdf = \App::make('dompdf');
        $pdf->loadView('pdf/tableTemplate', ['content'=>$content, 'title'=>$title, 'description'=>$description]);
        return $pdf->download($title.'.pdf');
    }

}