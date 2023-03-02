<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rundown extends Model
{
    use HasFactory;
    protected $fillable = ['time', 'event', 'careerfair_id', 'status'];
    
}
