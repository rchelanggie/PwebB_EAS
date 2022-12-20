<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosisiModel extends Model
{
    protected $table = 'posisi_jabatan';
    protected $primaryKey = 'id_posisi';
    protected $fillable = ['id_posisi', 'nama_posisi', 'id_lokasi'];
}
