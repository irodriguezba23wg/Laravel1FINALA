<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moduluak extends Model
{
    /** @use HasFactory<\Database\Factories\ModuluakFactory> */
    use HasFactory;
    
    protected $fillable = [
        'izena',
        'gela',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'moduluak_user', 'modulua_id', 'user_id');
    }
}
