<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'project';
    protected $primaryKey = 'id_project';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_unit',
        'nama_project',
        'no_ict',
        'jenis_pekerjaan',
        'estimasi',
        'rab',
        'bapp',
        'bast',
        'status',
        'id_pemohon',
        'tanggal_selesai',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id_unit');
    }

    // Relasi ke User (Pemohon)
    public function pemohon()
    {
        return $this->belongsTo(User::class, 'id_pemohon', 'id_user');
    }
}
