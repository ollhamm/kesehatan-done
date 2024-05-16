<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
    protected $table = "pemeriksaan";
    protected $primaryKey = "id_periksa";
    protected $fillable = [
        'id_pasien',
        'tanggal_pemeriksaan',
        'unit_pemeriksaan',
        'rujukan_pemeriksaan',
        'rincian_pemeriksaan',
        'jenis_pembayaran',
    ];



    public function patients()
    {
        return $this->belongsTo(Patient::class, 'id_pasien', 'id_pasien');
    }

}
