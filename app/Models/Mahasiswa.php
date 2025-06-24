<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    public $timestamps = true;
    protected $dates = ['deleted_at'];  

    protected $fillable = ['nim', 'nama', 'jk', 'tgl_lahir', 'jurusan', 'alamat'];
}
