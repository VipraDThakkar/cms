<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_conference extends Model
{
    use HasFactory;
    protected $table  ="user_conference";
    protected $primarykey = "id";
}
