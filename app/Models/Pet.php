<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $table = 'pets';
    protected $fillable = ['nama_hewan', 'jenis_hewan', 'ras', 'tanggal_lahir', 'nama_pemilik', 'kontak_pemilik', 'status'];
}