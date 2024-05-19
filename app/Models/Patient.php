<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id_pasien';
    use HasFactory;
    protected $fillable = [
        'nama',
        'umur',
        'jenis_kelamin',
        'alamat',
        'tempat_dan_tanggal_lahir',
        'rm',
        'rujukan',
        'jenis_asuransi',
        'nomor_asuransi',
        'status',
    ];
    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class, 'id_periksa', 'id_periksa');
    }

}
