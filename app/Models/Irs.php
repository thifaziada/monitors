<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irs extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_irs';
    
    protected $table = 'irs';

    protected $fillable = [
        'id_irs',
        'smst_aktif',
        'jumlah_sks',
        'berkas_irs',
        'status_irs',
        'id_mhs',
        'NIM',
        'persetujuan',
    ];

    public static function messages() {
        return [
            'smst_aktif.required' => 'Semester Aktif harus diisi.',
            'jumlah_sks.required' => 'SKS harus diisi.',
            'berkas_irs.required' => 'Berkas IRS harus diisi.',
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