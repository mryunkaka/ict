<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'unit';
    protected $primaryKey = 'id_unit';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nama_unit',
        'logo',
    ];

    protected $dates = ['deleted_at'];

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class, 'id_unit', 'id_unit');
    }

    // Relasi ke Aset
    public function aset()
    {
        return $this->hasMany(Aset::class, 'id_unit', 'id_unit');
    }

    // Relasi ke Perbaikan
    public function perbaikan()
    {
        return $this->hasMany(Perbaikan::class, 'id_unit', 'id_unit');
    }

    // Relasi ke Barang
    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_unit', 'id_unit');
    }

    // Relasi ke Downtime
    public function downtime()
    {
        return $this->hasMany(Downtime::class, 'id_unit', 'id_unit');
    }

    // Relasi ke PFI
    public function pfi()
    {
        return $this->hasMany(Pfi::class, 'id_unit', 'id_unit');
    }

    // Relasi ke Project
    public function project()
    {
        return $this->hasMany(Project::class, 'id_unit', 'id_unit');
    }
}
