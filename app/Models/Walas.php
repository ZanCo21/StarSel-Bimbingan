<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name_guru',
        'nip',
        'jenis_kelamin',
    ];

    protected $table = 'walas';
    protected $primaryKey = 'user_id';


    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
