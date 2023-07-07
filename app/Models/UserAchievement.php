<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAchievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'achievement_name',
        'achievement_description',
        'achievement_date',
        'achievement_level',
        'user_id',
    ];
}
