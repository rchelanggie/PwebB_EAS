<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    protected $table = 'data_diri';
    protected $primaryKey = 'id_data';
    protected $fillable = ['id_user', 'foto', 'nama', 'nik', 'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir', 'pendidikan', 'posisi_jabatan', 'alamat'];
}
