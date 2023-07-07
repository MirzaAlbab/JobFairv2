<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCertification extends Model
{
    use HasFactory;

    protected $fillable = [
        'certification_name',
        'certification_institution',
        'certification_date',
        'user_id',
    ];
}
