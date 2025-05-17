<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BAK extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bak';
    protected $primaryKey = 'id_bak';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_unit',
        'no_bak',
        'tanggal_bak',
        'dilaporkan_oleh',
        'jabatan_pelapor',
        'dept_pelapor',
        'uraian',
        'tindak_lanjut',
        'bisa_diperbaiki',
        'file_pdf',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id_unit');
    }

    // Relasi ke Item BAK
    public function items()
    {
        return $this->hasMany(ItemBAK::class, 'no_bak', 'no_bak');
    }
}
