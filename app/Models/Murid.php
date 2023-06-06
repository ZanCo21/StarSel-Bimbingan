<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Murid extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kelas_id',
        'name',
        'nipd',
        'tgl_lahir',
        'jenis_kelamin',
    ];

    protected $table = 'murids';
    protected $primaryKey = 'user_id';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function walas()
    {
        return $this->belongsTo(Walas::class, 'walas_id', 'user_id');
    }
}
