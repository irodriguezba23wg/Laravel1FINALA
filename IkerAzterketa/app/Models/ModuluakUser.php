<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuluakUser extends Model
{
    /** @use HasFactory<\Database\Factories\ModuluakFactory> */
    use HasFactory;
    
    protected $fillable = [
        
        'modulua_id',
        'user_id',
    ];
}
