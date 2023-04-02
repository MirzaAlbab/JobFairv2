<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'job_id', 'partner_id', 'status'];
    public function company(){
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }
    public function job(){
        return $this->belongsTo(Job::class,'job_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
