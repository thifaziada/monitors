<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_skripsi';

    protected $table = 'skripsi';

    protected $fillable = [
        'id_skripsi',
        'status_skripsi',
        'nilai_skripsi',
        'nilai_skripsi',
        'berkas_skripsi',
        'lama_studi',
        'tanggal_sidang',
        'id_mhs',
        'NIM',
        'persetujuan'
    ];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
    public function id()
    {
        return $this->belongsTo(User::class, 'id_mhs','id');
    }
}
