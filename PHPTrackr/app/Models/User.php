<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        
    ];

    protected $attributes = [
        'role' => 'Ontvanger',
     ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = false;
    
    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    public function getName(){
        return $this->name;
    }
   
    public function getRole(){
        return $this->role;
    }
   
    public function getId(){
        return $this->id;
    }

    
    public function isAdmin($id){
        if($this->where('id', $id)->pluck('role')->first() == 'Admin') {
            return true;
        }else return false;
    }

    public function isReceiver($id){
        if($this->where('id', $id)->pluck('role')->first() == 'Admin' || 
        $this->where('id', $id)->pluck('role')->first() == 'Ontvanger') {
            return true;
        }else return false;
    }

    
    public function canWrite($id){
        if($this->where('id', $id)->pluck('role')->first() == 'Admin' || 
        $this->where('id', $id)->pluck('role')->first() == 'Adminstratief') {
            return true;
        }else return false;
    }

    public function canRead($id){
        if($this->where('id', $id)->pluck('role')->first() == 'Admin' || 
        $this->where('id', $id)->pluck('role')->first() == 'Adminstratief' || 
        $this->where('id', $id)->pluck('role')->first() == 'Inpakker') {
            return true;
        }else return false;
    }

    public function hasRole($id, $role)
    {
        if($this->where('role', $role)->where('id', $id)) {
            return true;
        }else return false;

    }

    
}
