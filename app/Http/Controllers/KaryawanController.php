<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    //Melakukan fungsi index
    public function index()
    {

    	// mengambil data pegawai
    	$karyawan_data = karyawan::all();
 
    	// mengirim data pegawai ke view pegawai
    	return view('karyawan', ['karyawan' => $karyawan_data]);  	
    }

    //Fungsi tambah
    public function tambah()
{
 
		return view('tambah');
 
}
	//Fungsi simpan
	public function store(Request $request)
{
	// menyimpan data file yang diupload ke variabel $file
	
	

		$file = $request->file('file');
		$nama_file = $file->getClientOriginalName();
 
		$tujuan_upload = 'data_file';
 
                // upload file
		$file->move($tujuan_upload,$file->getClientOriginalName());
		
    	Karyawan::create([
    		'nama' => $request->nama_karyawan,
    		'jenis_kelamin' => $request->jk_karyawan,
    		'no_hp' => $request->hp_karyawan,
    		'email' => $request->email_karyawan,
    		'salary' => $request->gaji,
    		'foto' => $nama_file

    	]);
		return redirect('/karyawan'); 
}
	//edit data
	public function edit($id)
	{
		$karyawan=Karyawan::find($id);
		return view('edit',['karyawan' => $karyawan]);

	}
	//update data
	public function update($id,Request $request)
{
	// update data pegawai
		$karyawan=Karyawan::find($id);
		$karyawan->nama = $request->nama;
		$karyawan->jenis_kelamin = $request->jenis_kelamin;
		$karyawan->no_hp = $request->no_hp;
		$karyawan->email = $request->email;
		$karyawan->salary = $request->salary;
		$karyawan->foto = $request->foto;
		$karyawan->save();
		//DB::table('data_diri')->where('id',$request->id)->update([
		//'nama' => $request->nama_karyawan,
		//'jenis_kelamin' => $request->jk_karyawan,
		//'no_hp' => $request->hp_karyawan,
		//'email' => $request->email_karyawan,
		//'salary' => $request->gaji,
	//]);
	// alihkan halaman ke halaman pegawai
	return redirect('/karyawan');
}

	public function hapus($id){

		$karyawan=Karyawan::find($id);
		$karyawan->delete();
    return redirect('/karyawan');
		
	// alihkan halaman ke halaman pegawai
		return redirect('/karyawan');
	}
	 public function cetak($id)
    {

    	$karyawan=Karyawan::find($id);
    	
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $value= [
        	[
        		'name' => 'nama',
        	 	'isi' => $karyawan->nama,
        	],
        	[
        		'name' => 'Jenis Kelamin',
        		'isi'	=> $karyawan->jenis_kelamin,
        	],
        	[
        		'name' => 'email',
        		'isi' => $karyawan->email,
        	],
        	[
        		'name' => 'Nomor HP',
        		'isi' => $karyawan->no_hp,
        	],
        	[
        		'name' => 'gaji/pendapatan',
        		'isi' => $karyawan->salary,
        	],
        	[
        		'name' => 'Foto url',
        		'isi' => $karyawan->foto,
        	],
        ];

        
       // $text = $section->addImage("'/data_file/'.$karyawan->foto");
        $itemsTableStyle =array('borderSize' => 4, 'borderColor' => '85837f', 'cellMargin' => 80, );
        $heading = array('size' => 14, 'bold' => false, 'color' => '65676B');

        $valueTableHeading = 'value';
        $phpWord->addTableStyle($valueTableHeading, $itemsTableStyle);
        $section->addText('Data Karyawan', $heading);
        $table = $section->addTable($valueTableHeading);
        $table->addRow(500);
        $table->addCell(1750)->addText('Field', array('bold' => true));
        $table->addCell(1750)->addText('Value', array('bold' => true));

        foreach ($value as $item)
    {
        $table->addRow(500);
        $table->addCell(1750)->addText($item['name']);
        $table->addCell(1750)->addText($item['isi']);
    }

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('DataKaryawan.docx');
        return response()->download(public_path('DataKaryawan.docx'));
}
}
