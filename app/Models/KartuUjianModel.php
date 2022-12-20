<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuUjianModel extends Model
{
    protected $table = 'kartu_ujian';
    protected $primaryKey = 'id_kartu';
    protected $fillable = ['id_user', 'tanggal_ujian'];
}
