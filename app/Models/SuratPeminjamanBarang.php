<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratPeminjamanBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'surat_peminjaman_barang';
    protected $primaryKey = 'id_peminjaman';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_unit',
        'id_aset',
        'nama_peminjam',
        'jabatan_peminjam',
        'dept_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'keperluan',
        'status_peminjaman',
        'file_pdf',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id_unit');
    }

    // Relasi ke Aset
    public function aset()
    {
        return $this->belongsTo(Aset::class, 'id_aset', 'id_aset');
    }
}
