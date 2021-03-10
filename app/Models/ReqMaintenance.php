<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReqMaintenance extends Model
{
    use HasFactory;
    protected $fillable = ['subject', 'description','image','location','status','user_id','remarks'];
}
