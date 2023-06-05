<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gurubk extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'kelas',
        'tgl_lahir',
        'jenis_kelamin',
    ];

    protected $table = 'gurubk';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
