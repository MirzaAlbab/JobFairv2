<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'job_title',
        'job_description',
        'start_date',
        'end_date',
        'is_current_job',
        'status',
        'user_id',
    ];
}
