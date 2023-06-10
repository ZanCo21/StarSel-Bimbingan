<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gurubk extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'kelas',
        'nip',
        'tgl_lahir',
        'jenis_kelamin',
    ];

    protected $table = 'gurubk';
    protected $primaryKey = 'user_id';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function kelass()
    {
        return $this->hasMany(Kelas::class, 'gurubk_id', 'user_id');
    }
}
