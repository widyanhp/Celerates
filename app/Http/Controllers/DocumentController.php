<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class DocumentController extends Controller
{

    public function create($id,Request $request)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $document=Karyawan::find($id);
        $text = $section->addText($request->nama);
        $text = $section->addText($request->jenis_kelamin);
        $text = $section->addText($request->email);
        $text = $section->addText($request->no_hp);
        $text = $section->addText($request->salary);
        $text = $section->addImage("('/data_file/'.$request->foto)");
        $text = $section->addText($request->get('nomor_hp'),array('name'=>'Arial','size' => 20,'bold' => true)); 
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('DataKaryawan.docx');
        return response()->download(public_path('DataKaryawan.docx'));
}

}