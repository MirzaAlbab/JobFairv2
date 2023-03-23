<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'job_id', 'partner_id', 'status'];
    public function Company(){
        return $this->hasOne(Partner::class,'id','partner_id');
    }
    public function JobApply(){
        return $this->hasOne(Job::class,'id','job_id');
    }
}
