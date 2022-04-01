<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'description'];
    protected $primaryKey = "name";

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
