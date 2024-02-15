<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen'; 

    protected $primaryKey = 'NIP'; 

    public $timestamps = false; 

    protected $fillable = [
        'NIP', 
        'nama_doswal', 
        'email', 
        'alamat', 
        'no_HP', 
        'foto'];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'NIP', 'NIP');
    }

    use HasFactory;
}
