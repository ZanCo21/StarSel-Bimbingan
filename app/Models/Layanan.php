<?php

namespace App\Models;

use App\Models\Konseling;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'jenis_layanan',
    ];

    protected $table = 'layanans';


    public function konseling()
    {
        return $this->hasMany(Konseling::class, 'layanan_id', 'id');
    }
    
}
