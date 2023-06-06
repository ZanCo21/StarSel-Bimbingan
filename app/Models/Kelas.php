<?php

namespace App\Models;

use App\Models\Walas;
use App\Models\Gurubk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'gurubk_id',
        'walas_id',
        'jurusan',
        'tingkat_kelas',
    ];

    protected $table = 'kelas';

    public function walas()
    {
        return $this->belongsTo(Walas::class, 'walas_id', 'user_id');
    }

    public function gurubk()
    {
        return $this->belongsTo(Gurubk::class, 'gurubk_id', 'user_id');
    }
    
}
