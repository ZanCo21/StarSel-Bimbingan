<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoutLog extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'ip_address', 'timestamp'];
    protected $table = 'logout_logs';
    protected $primaryKey = 'id';

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
