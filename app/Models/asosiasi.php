<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asosiasi extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama_asosiasi',
        'foto_asosiasi',
        'deskripsi'
    ];
}
