<!DOCTYPE html>
<html>
<head>
	<title>Celerates</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
	<title>Data Karyawan Celerates</title>
</head>
<body>
 	<div class="container">
 		<div class="card mt-5">
                <div class="card-header text-center">
                    Data Karyawan Celerates
                </div>
                <div class="card-body">
	
	<a href="/karyawan/tambah" class="btn btn-primary">Tambah</a>
	
	<br/>
	<br/>
 
	<table border="1">
		<tr>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>No HP</th>
			<th>Email</th>
			<th>Gaji</th>
			<th>Foto</th>
		</tr>
		@foreach($karyawan as $ka)
		<tr>
			<td>{{ $ka->nama }}</td>
			<td>{{ $ka->jenis_kelamin }}</td>
			<td>{{ $ka->no_hp }}</td>
			<td>{{ $ka->email }}</td>
			<td>{{ $ka->salary }}</td>
			<td><img width="159px" src="{{ url('/data_file/'.$ka->foto) }}"></td>
			<td>
				<a href="/karyawan/edit/{{ $ka->id }}" class="btn btn-warning">Edit</a>
		
				<a href="/karyawan/hapus/{{ $ka->id }}" class="btn btn-danger">Delete</a>
				<a href="/karyawan/cetak/{{ $ka->id }}" class="btn btn-success">Cetak</a>
			</td>
		</tr>
		@endforeach
	</table>
 
 
</body>
</html>