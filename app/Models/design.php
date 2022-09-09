<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class design extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_design',
        'jenis_design',
        'deskripsi',
        'foto',
        'status',
        'user_id'
    ];

    public function revisi(){
    	return $this->hasMany(revisi_design::class);
    }
}
