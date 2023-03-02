<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['position', 'level', 'kategori', 'requirement','gaji', 'deskripsi', 'penempatan', 'partner_id'];

    public function Jobsin(){
        return $this->hasOne(Partner::class,'id','partner_id');
    }
}
