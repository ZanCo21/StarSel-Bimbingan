<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Murid;
use App\Models\Walas;

class Kerawanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'walas_id',
        'gurubk_id',
        'murid_id',
        'kerawanan_id',
        'kesimpulan',
        'created_at',
        'updated_at',
    ];

    protected $table = 'peta_kerawanan';
    protected $primaryKey = 'id';

    public function gurus()
    {
        return $this->belongsTo(Gurubk::class, 'gurubk_id');
    }
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'murid_id');
    }
    public function murids()
    {
        return $this->hasMany(Murid::class, 'user_id', 'murid_id');
    }
    public function walas()
    {
        return $this->hasMany(Walas::class, 'user_id', 'walas_id');
    }
    public function walass()
    {
        return $this->belongsTo(Walas::class, 'walas_id');
    }
    public function jenis_kerawanan()
    {
        return $this->hasMany(JenisKerawanan::class, 'id','kerawanan_id');
    }
    public function jeniskerawanan()
    {
        return $this->belongsTo(jeniskerawanan::class, 'kerawanan_id','id');
    }
}
