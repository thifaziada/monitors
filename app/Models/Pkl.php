<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pkl';

    protected $table = 'pkl';

    protected $fillable = [
        'id_pkl', 
        'status_pkl', 
        'nilai_pkl', 
        'berkas_pkl', 
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


