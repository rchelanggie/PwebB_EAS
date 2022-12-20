<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasModel extends Model
{
    protected $table = 'berkas';
    protected $primaryKey = 'id_berkas';
    protected $fillable = ['id_user', 'ijazah', 'ktp', 'kk', 'formulir', 'status_dokumen'];
}
