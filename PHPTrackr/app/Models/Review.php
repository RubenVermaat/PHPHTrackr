<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Review extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'comment',
        'rating',
        'updated_at'
    ];


}
