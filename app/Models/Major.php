<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','name', 'faculty_id',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
