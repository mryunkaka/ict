<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PingServer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ping_server';
    protected $primaryKey = 'id_ping';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nama_perangkat',
        'ip_address',
        'status',
        'last_checked',
    ];

    protected $dates = ['deleted_at'];

    // Fungsi untuk mengecek apakah perangkat online atau offline
    public function isOnline()
    {
        return $this->status === 'online';
    }
}
