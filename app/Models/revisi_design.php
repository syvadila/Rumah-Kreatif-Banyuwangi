<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class revisi_design extends Model
{
    use HasFactory;
    protected $fillable = [
        'deskripsi_revisi',
        'foto_revisi',
        'foto_hasil',
        'design_id'
    ];
}
