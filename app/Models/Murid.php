<?php

namespace App\Models;

use App\Models\User;
use App\Models\Konseling;
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
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function kelass()
    {
        return $this->hasMany(Kelas::class, 'id', 'kelas_id');
    }
    public function walas()
    {
        return $this->kelas()->belongsTo(Walas::class, 'walas_id');
    }
    public function walass()
    {
        return $this->hasMany(Walas::class, 'user_id');
    }
    public function konseling()
    {
        return $this->belongsTo(Konseling::class);
    }
    public function peta_kerawanans(){
        return $this->belongsTo(Kerawanan::class);
    }
    public function peta_kerawanan()
    {
        return $this->hasMany(Kerawanan::class, 'murid_id','user_id');
    }
}
