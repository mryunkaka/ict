<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'email';
    protected $primaryKey = 'id_email';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_unit',
        'no_email',
        'tanggal_email',
        'nama_pemohon',
        'jabatan_email',
        'dept_email',
        'jenis_email',
        'pemohon_email',
        'perangkat_user',
        'keperluan_email',
        'alamat_email',
        'keterangan',
        'status',
        'file_email',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id_unit');
    }
}
