<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;
    protected $table = "decisions";
    protected $fillable = [
        'title',
        'description',
        'adminstrator'
        ] ;
}
