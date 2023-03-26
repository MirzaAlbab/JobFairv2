<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'type', 'category', 'education','salary', 'start_date','end_date', 'description','city', 'partner_id'];
   
    public function Jobsin(){
        return $this->hasOne(Partner::class,'id','partner_id');
    }
}
