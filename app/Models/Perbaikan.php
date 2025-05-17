<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perbaikan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perbaikan';
    protected $primaryKey = 'id_perbaikan';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_unit',
        'no_perbaikan',
        'tanggal_perbaikan',
        'nama_pemohon',
        'jabatan_pemohon',
        'dept_pemohon',
        'id_barang',
        'masalah',
        'file_pdf',
        'status',
        'id_teknisi',
        'biaya_perbaikan',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id_unit');
    }

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    // Relasi ke User (Teknisi)
    public function teknisi()
    {
        return $this->belongsTo(User::class, 'id_teknisi', 'id_user');
    }
}
