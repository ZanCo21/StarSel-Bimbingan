<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKerawanan extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'id',
        'jenis_kerawanan',
    ];

    protected $table = 'jenis_kerawanan';

}
