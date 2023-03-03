<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['job_title', 'type', 'kategori', 'status','salary', 'graduation', 'deskripsi','kota', 'partner_id'];
   
    public function Jobsin(){
        return $this->hasOne(Partner::class,'id','partner_id');
    }
}
