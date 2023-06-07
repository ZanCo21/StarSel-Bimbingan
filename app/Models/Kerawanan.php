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
        'murid_id',
        'jenis_kewaranan',
        'created_at',
        'updated_at',
    ];

    protected $table = 'peta_kerawanan';
    
    public function murids()
    {
        return $this->hasMany(Murid::class, 'user_id', 'murid_id');
    }
    public function walas()
    {
        return $this->hasMany(Walas::class, 'user_id', 'walas_id');
    }
}
