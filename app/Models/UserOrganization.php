<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'organization_name',
        'job_title',
        'start_date',
        'end_date',
        'job_description',
        'is_current_organization',
    ];
}
