<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filedownload extends Model
{
    use HasFactory;

    protected $fillable =[
        'ip' , 'user_agent','file_id','count'
    ];
}
