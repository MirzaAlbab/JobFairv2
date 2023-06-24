<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnersNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'partner_id', // 'partner_id' is the same as 'id' in 'partners' table
        'title',
        'message',
        'user',
        'status',
    ];
   
}
