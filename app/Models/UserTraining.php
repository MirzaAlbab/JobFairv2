<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTraining extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_name',
        'training_institution',
        'training_date',
        'training_expiration_date',
        'is_training_expired',
        'user_id',
    ];
}
