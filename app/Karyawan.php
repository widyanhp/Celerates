<?php
 
namespace App;

 
use Illuminate\Database\Eloquent\Model;
 
class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $fillable = ['nama','jenis_kelamin','no_hp','email','salary','foto'];
}