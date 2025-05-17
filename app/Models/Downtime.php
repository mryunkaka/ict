<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Downtime extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'downtime';
    protected $primaryKey = 'id_downtime';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_unit',
        'tanggal_input',
        'down_awal',
        'down_akhir',
        'durasi_downtime',
        'penyebab_downtime',
        'keterangan',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id_unit');
    }
}
