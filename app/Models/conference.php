<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conference extends Model
{
    use HasFactory;
    protected $table  ="conference";
    protected $primarykey = "id";

}