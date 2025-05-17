<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aset extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'aset';
    protected $primaryKey = 'id_aset';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_unit',
        'id_user',
        'form_bast',
        'serial_number',
        'no_aset',
        'desc_aset',
        'lokasi',
        'foto_aset',
        'tahun_perolehan',
        'usia',
        'status_aset',
        'kategori_aset',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id_unit');
    }

    // Relasi ke User (yang memiliki aset)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi ke Surat Peminjaman Barang
    public function suratPeminjaman()
    {
        return $this->hasMany(SuratPeminjamanBarang::class, 'id_aset', 'id_aset');
    }
}
