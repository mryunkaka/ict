<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemBak extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'item_bak';
    protected $primaryKey = 'id_item_bak';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'tanggal_item_bak',
        'no_bak',
        'id_unit',
        'jenis_barang',
        'merk_tipe',
        'nomor_aset',
        'serial_number',
        'pengguna_aset',
        'foto',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id_unit');
    }

    // Relasi ke BAK
    public function bak()
    {
        return $this->belongsTo(Bak::class, 'no_bak', 'no_bak');
    }
}
