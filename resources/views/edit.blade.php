<!DOCTYPE html>
<html>
<head>
	<title>Celerates - update </title>
	        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 
	<h> Update Data Karyawan </h>
 
	
	<br/>
	<br/>
 
	
	<form action="/karyawan/update/{{$karyawan->id}}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}

		<div class="form-group">
		Nama <input type="text"  required="required" name="nama" value="{{ $karyawan->nama }}"> <br/></div>

		<div class="form-group">
		Jenis Kelamin <input type="text" class="form-control" required="required" name="jenis_kelamin" value="{{ $karyawan->jenis_kelamin}}"> <br/></div>

		<div class="form-group">
		Nomor HP <input type="number" class="form-control" required="required" name="no_hp" value="{{ $karyawan->no_hp }}"> <br/></div>

		<div class="form-group">
		Email <input type="text" class="form-control" required="required" name="email" value="{{ $karyawan->email}}"> <br/></div>

		<div class="form-group">
		Gaji <input type="number" class="form-control" required="required" name="salary" value="{{ $karyawan->salary}}"> <br/></div>

		<div class="form-group">
		<input type="submit" value="Simpan">
		</div>
	</form>
	
		
 	<a href="/karyawan"> Kembali</a>
</body>
</html>