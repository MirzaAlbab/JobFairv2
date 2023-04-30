<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careerfair extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'start_date', 'end_date','img', 'status', 'user', 'qr'];

    public function Partnership()
    {
        return $this->hasMany(Partner::class);
    }

    public function Events()
    {
        return $this->hasMany(Event::class);
    }
    
}
