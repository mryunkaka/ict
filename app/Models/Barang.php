<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_pfi',
        'tanggal_barang',
        'nama_barang',
        'merk_tipe',
        'jumlah_barang',
        'satuan',
        'harga_barang',
        'total_barang',
        'gambar',
        'keterangan',
        'status_barang',
        'jenis_barang',
        'no_pp',
        'no_ppm',
        'no_po',
        'file_penawaran',
        'file_pfi',
        'file_pp',
        'file_ppm',
        'file_po',
        'file_surat_jalan',
        'file_serah_terima',
        'file_bukti_pembayaran',
        'progres',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke PFI
    public function pfi()
    {
        return $this->belongsTo(Pfi::class, 'id_pfi', 'id_pfi');
    }

    // Relasi ke Perbaikan
    public function perbaikan()
    {
        return $this->hasMany(Perbaikan::class, 'id_barang', 'id_barang');
    }
}
