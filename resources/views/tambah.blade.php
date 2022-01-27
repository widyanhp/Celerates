<!DOCTYPE html>
<html>
<head>
	<title>Celerates - tambah</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 
	<h>tambah data karyawan</h>

	
	<br/>
	<br/>
 
	<form action="/karyawan/store" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form group">
		Nama <input type="text" name="nama_karyawan" required="required"> <br/>
		</div>
		<div class="form group">
		Jenis Kelamin <input type="text" name="jk_karyawan" required="required"> <br/>
		</div>
		<div class="form group">
		Nomor HP <input type="number" name="hp_karyawan" required="required"> <br/>
		</div>
		<div class="form group">
		Email <textarea name="email_karyawan" required="required"></textarea> <br/>
		</div>
		<div class="form group">
		Gaji <input type="number" name="gaji"></textarea> <br/>
		</div>
		<div class="form group">
		Foto <input type="file" name="file"> <br/>
		</div>
		<div class="form group">
		<input type="submit" value="Simpan">
		</div>
	</form>

	<br/>
 
	<a href="/karyawan" class="btn btn-primary"> Kembali</a>
 
</body>
</html>