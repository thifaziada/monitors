<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_khs';
    
    protected $table = 'khs';

    protected $fillable = [
        'id_khs',
        'smt_aktif' ,
        'SKS_semester',
        'SKS_kumulatif',
        'IP_smt',
        'IP_kumulatif',
        'berkas_KHS',
        'status_khs' ,
        'id_mhs' ,
        'NIM' ,
        'persetujuan' ,
    ];

    public static function messages() {
        return [
            'smt_aktif.required' => 'Semester Aktif harus diisi.',
            'SKS_semester.required' => 'SKS harus diisi.',
            'IP_smt.required' => 'IP semester harus diisi.',
            'berkas_KHS.required' => 'Berkas KHS harus diisi.',
        ];
    }
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs', 'id_mhs');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_mhs', 'id');
    }
}