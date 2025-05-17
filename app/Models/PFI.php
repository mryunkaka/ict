<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PFI extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pfi';
    protected $primaryKey = 'id_pfi';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_unit',
        'tanggal_pfi',
        'no_pfi',
        'prioritas',
        'type',
        'pengguna',
        'dept',
        'alasan_kebutuhan',
        'progres',
        'nama_staff',
        'file_pdf',
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
        return $this->hasMany(Barang::class, 'id_pfi', 'id_pfi');
    }
}
