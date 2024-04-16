<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paper_type extends Model
{
    use HasFactory;
    protected $table  ="paper_type";
    protected $primarykey = "id";
}
