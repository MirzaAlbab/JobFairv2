<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = ['company', 'description', 'position','careerfair_id', 'img', 'status'];

    public function AOCF()
    {
        return $this->hasOne(Careerfair::class, 'id', 'careerfair_id');
    }
    public function Jobs(){
        return $this->hasMany(Job::class);
    }
    
}
