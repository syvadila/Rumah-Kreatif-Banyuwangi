<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_konsultasi extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal', 'konsultasi', 'waktu', 'status', 'user_id'];
}
